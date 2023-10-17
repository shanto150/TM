<?php

namespace App\Http\Controllers\Tasks;

use App\Models\User;
use App\Models\Party;
use App\Models\Task\Task;
use Illuminate\Http\Request;
use App\Models\Task\Task_group;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class TaskController extends Controller
{
    public function index()
    {
        $airlines = Party::where('party_type', 'Airlines')->select('id', 'name')->get();
        $parties = Party::select('id', 'name', 'party_type')->get();
        $users = User::select('id', 'name', 'designation')->get();

        return view('tasks.tasks', compact('airlines', 'parties','users'));
    }

    public function store(Request $request)
    {
        $rowId = $request->input('id');

        $Party = Task::where(['id' => $rowId]);

        if ($Party->exists()) {
            Task::where('id', $rowId)->update(
                ['party_id' => $request->party_id, 'task_type' => $request->task_type, 'task_date' => $request->task_date, 'start_time' => $request->start_time, 'end_time' => $request->end_time, 'duration' => $request->duration, 'priority' => $request->priority, 'assign_to' => $request->assign_to, 'zone' => $request->zone, 'area_type' => $request->area_type, 'area_id' => $request->area_id, 'title' => $request->title, 'note' => $request->note]);
                Task_group::where('task_id',  $rowId)->delete();
                if ($request->user_id) {
                foreach($request->user_id as $user_id){
                    $Task_group                = new Task_group;
                    $Task_group->task_id    =  $rowId;
                    $Task_group->user_id  =  $user_id;
                    $Task_group->save();
                }}
                $notify = ['messege' => 'Successfully Updated', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        } else {

            $ifsave=Task::create($request->all());
            if ( $ifsave) {

                if ($request->user_id) {
                    foreach($request->user_id as $user_id){
                        $Task_group                = new Task_group;
                        $Task_group->task_id    =  $ifsave->id;
                        $Task_group->user_id  =  $user_id;
                        $Task_group->save();
                    }
                }

            }
            $notify = ['messege' => 'Successfully Saved', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        }
    }

    public function Get_tasks_Data()
    {

        $data = DB::table('tasks AS t')
            ->leftjoin('parties AS p', 't.party_id', '=', 'p.id')
            ->selectRaw("date_format(task_date,'%d-%b-%Y') task_date,t.priority,task_type,p.name, concat(p.party_type,'-',p.category ) type_category, concat(t.start_time,'-',t.end_time ) st_et,
            concat(t.duration,' Minutes') duration,f_staff_name(t.assign_to) assign_to,zone,f_location(t.area_type ,t.area_id ) area, t.status,party_id, start_time, end_time, duration duration1,
            assign_to assign_to1,area_type, area_id, title, t.note,t.id")
            ->orderByDesc('t.id')
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getGroupPeople(Request $request)
    {
        $rTaskID = $request->rTaskID;

        $data['data'] = DB::table('task_groups')
        ->select('user_id')
        ->where('task_id',$rTaskID)
        ->get();
        return response()->json($data);
    }

    public function TaskStatusUpdate(Request $request)
    {
        // dd($request->all());
        $rTaskID = $request->rTaskID;

        Task::where('id', $rTaskID)->update(
        ['note' => $request->snote,'status' => $request->status]);

        $notify = ['messege' => 'Successfully Updated', 'alert-type' => 's'];

        return redirect()->back()->with($notify);

    }

}

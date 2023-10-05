<?php

namespace App\Http\Controllers\feedback;

use App\Http\Controllers\Controller;
use App\Models\feedback\Feedback;
use App\Models\Party;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class FeedbackController extends Controller
{
    public function index()
    {
        $airlines = Party::where('party_type', 'Airlines')->select('id', 'name')->get();
        $parties = Party::select('id', 'name', 'party_type')->get();
        // Debugbar::info('dd');

        return view('feedback.feedback', compact('airlines', 'parties'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $rowId = $request->input('id');

        $Party = Feedback::where(['id' => $rowId]);

        if ($Party->exists()) {
            Feedback::where('id', $rowId)->update(['f_date' => $request->f_date, 'f_type' => $request->f_type, 'party_id' => $request->party_id, 'offer_category' => $request->offer_category, 'airline_id' => $request->airline_id, 'channel' => $request->channel, 'discount_value' => $request->discount_value, 'additional_discount' => $request->additional_discount, 'area_type' => $request->area_type, 'area_id' => $request->area_id, 'Validity_type' => $request->Validity_type, 'days' => $request->days, 'from_date' => $request->from_date, 'to_date' => $request->to_date, 'note' => $request->note]);
            $notify = ['messege' => 'Successfully Updated', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        } else {

            Feedback::create($request->all());
            $notify = ['messege' => 'Successfully Saved', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        }
    }

    public function getDivisionDistrictCity(Request $request)
    {
        $requestType = $request->requestType;

        if ($requestType == 'Division') {
            $data['data'] = DB::table('divisions')->selectRaw('initcap(replace(name_en,"DIVISION","")) name_en,id')->get();

            return response()->json($data);
        } elseif ($requestType == 'District') {
            $data['data'] = DB::table('districts')->selectRaw('initcap(name_en) name_en,id')->get();

            return response()->json($data);
        } elseif ($requestType == 'City') {
            $data['data'] = DB::table('upazilas')->selectRaw('initcap(name_en) name_en,id')->get();

            return response()->json($data);
        } else {
            $data['data'] = ['messege' => 'No Data', 'alert-type' => 'e'];
        }
    }

    public function Get_feedback_Data()
    {

        $data = DB::table('feedback AS f')
            ->leftjoin('parties AS p', 'f.party_id', '=', 'p.id')
            ->selectRaw("f.id,DATE_FORMAT(f_date,'%d-%b-%Y') fdate,f_type,concat(p.name,' - ',channel) partyandchennel,concat(discount_value,' ',offer_category) offers ,
            if(ISNULL(airline_id),'',p.name) airline_name  ,if(ISNULL(additional_discount),'',additional_discount) additional_discount ,
            if (Validity_type='Days',if(ISNULL(concat(days,' Days')),'',concat(days,' Days')),concat(DATE_FORMAT(from_date,'%d-%b-%Y'),'~',DATE_FORMAT(to_date,'%d-%b-%Y'))) duration,
            if(ISNULL(area_type),'',f_location(area_type ,area_id)) place,party_id,offer_category,airline_id,channel,discount_value,area_type,area_id,Validity_type,days")
            ->orderByDesc('f.id')
            ->get();


        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}

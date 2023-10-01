<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PartyController extends Controller
{
    public function index()
    {
        return view('parties.index');
    }

    public function getdistricts(Request $request)
    {
        $division_id = $request->division_id;
        $data['districts_list'] = DB::table('districts')->where('division_id', $division_id)->select('name_en', 'id')->get();

        return response()->json($data);
    }

    public function getCity(Request $request)
    {
        $district_id = $request->district_id;
        $data['city_list'] = DB::table('upazilas')->where('district_id', $district_id)->select('name_en', 'id')->get();

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $rowId = $request->input('id');

        $Party = Party::where(['id' => $rowId]);

        if ($Party->exists()) {
            Party::where('id', $rowId)->update(['party_type' => $request->party_type, 'name' => $request->name, 'category' => $request->category, 'established' => $request->established, 'contact_name' => $request->contact_name, 'designation' => $request->designation, 'mobile' => $request->mobile, 'email' => $request->email, 'country' => $request->country, 'division' => $request->division, 'district' => $request->district, 'city' => $request->city, 'address' => $request->address, 'note' => $request->note]);
            $notify = ['messege' => 'Successfully Updated', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        } else {

            Party::create($request->all());
            $notify = ['messege' => 'Successfully Saved', 'alert-type' => 's'];

            return redirect()->back()->with($notify);
        }
    }

    public function Get_party_Data(Request $request)
    {

        $data = DB::table('parties')->selectRaw("id,name,party_type,category,if(isnull(contact_name),'-',contact_name) contact_name,if(isnull(designation),'-',designation) designation,if(isnull(mobile),'-',mobile) mobile, if(isnull(email),'-',email) email,
        if(isnull(division),'-',f_divisions(division)) ddivision,if(ISNULL(district),'-',f_districts(district)) ddistrict,if(ISNULL(city),'-',f_city(city)) dcity,if(ISNULL(address),'-',address) address,if(ISNULL(established),'-', DATE_FORMAT(established,'%d-%b-%Y')) established,note,division,district,city")
            ->orderByDesc('id')
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);

    }
}

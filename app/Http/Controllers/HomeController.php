<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function index()
    {
        return view('home.home');
    }

    public function indexUserVerification()
    {
        return view('users.verification');
    }

    public function Get_User_Data(Request $request)
    {

        if ($request->ajax()) {

            $data = User::select('id', 'name', 'designation', 'email', 'status', DB::raw('if(status="unverified",1,0) as orderby'))
            ->orderByDesc('orderby')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function Status_Update(Request $request)
    {
        $user_id = $request->user_id;
        $status = $request->status;

        if ($request->ajax()) {
            User::where('id', $request->user_id)->update(
                [
                    'status' => $request->status,
                ]);

            return response()->json(['messege' => 'Successfully Updated.', 'types' => 's']);
        }
    }
}

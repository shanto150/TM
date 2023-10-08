<?php

namespace App\Http\Controllers\Tasks;

use App\Models\User;
use App\Models\Party;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $airlines = Party::where('party_type', 'Airlines')->select('id', 'name')->get();
        $parties = Party::select('id', 'name', 'party_type')->get();
        $users = User::select('id', 'name', 'designation')->get();

        return view('tasks.tasks', compact('airlines', 'parties','users'));
    }
}

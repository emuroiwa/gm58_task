<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function versionone()
    {
        if (Auth::check())
            {
                $id = Auth::id();
            }
        $totalTasksAssigned=Task::where('assignee',$id)->count();
        $totalTasks=Task::count();
        $percentageTasks=$totalTasksAssigned/$totalTasks*100;

        $data=[
            'tasks'=> $totalTasksAssigned,
            'totalTasks'=> $totalTasksAssigned,
            'percentageTasks'=> $percentageTasks
        ];
       // return $data;
        return view('dashboard.v1')->with('tasks',$data);
    }
    public function versiontwo()
    {
        return view('dashboard.v2');
    }
    public function versionthree()
    {
        return view('dashboard.v3');
    }
}

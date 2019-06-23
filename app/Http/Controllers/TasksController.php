<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use DateTime;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks= Task::all();
        return view('tasks.viewTasks')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('tasks.addTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = new DateTime();
        if (Auth::check()) {
            $task = Task::create([
                'issue_type' => $request->input('taskType'),
                'subject' => $request->input('taskSubject'),
                'description' => $request->input('taskDescription'),
                'key' => $request->input('taskDescription'),
                'assignee' =>1,
                'status' =>1,
                'priority' =>1,
                'due_date' =>$now,
                'registed_by' => Auth::user()->id
            ]);


            if ($task) {
                return view('tasks.addTask')->with('success','success');
            }

        }

        return view('tasks.addTask')->with('error','error');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task= Task::find($id);
        return view('tasks.viewTasks')->with('tasks',$tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

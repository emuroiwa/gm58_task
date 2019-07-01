<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\IssuePriority;
use App\IssueType;
use App\IssueStatus;
use App\User;
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
        if (Auth::check())
        {
            $id = Auth::id();
        
       // $tasks= Task::all();

        $tasks = Task::leftJoin('issue_types', 'issue_types.id', '=', 'tasks.issue_type')
        ->leftJoin('issue_statuses', 'issue_statuses.id', '=', 'tasks.status')
        ->leftJoin('issue_priorities', 'issue_priorities.id', '=', 'tasks.priority')
        ->leftJoin('users', 'users.id', '=', 'tasks.registed_by')
        ->select('tasks.*','issue_types.*','issue_statuses.*','issue_priorities.*','users.name')
        ->where('tasks.assignee','=',$id)
        ->orderby('tasks.priority','tasks.due_date','tasks.status')->get();
        //return $tasks;
        return view('tasks.viewTasks')->with('tasks',$tasks);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
        {
            $id = Auth::id();
            $priorities=IssuePriority::all();
            $statuses=IssueStatus::all();
            $types=IssueType::all();
            $assignees=User::where('id','<>',$id)->get();
            $data=[
                'priorities'=> $priorities,
                'types'=> $types,
                'statuses'=> $statuses,
                'assignees'=> $assignees
            ];
            //   return $data;
            return view('tasks.addTask')->with('data',$data);
        }
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
                'assignee' =>$request->input('assignee'),
                'status' =>$request->input('taskStatus'),
                'priority' =>$request->input('taskpriority'),
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
        //return$task;
        return view('tasks.viewTask')->with('task',$task);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\IssuePriority;
use App\IssueType;
use App\IssueStatus;
use App\User;
use DateTime;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\TaskCreated;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTasks(){
        if (Auth::check())
        {
            $id = Auth::id();
        
        return Task::leftJoin('issue_types', 'issue_types.id', '=', 'tasks.issue_type')
        ->leftJoin('issue_statuses', 'issue_statuses.id', '=', 'tasks.status')
        ->leftJoin('issue_priorities', 'issue_priorities.id', '=', 'tasks.priority')
        ->leftJoin('users', 'users.id', '=', 'tasks.registed_by')
        ->select('tasks.*','issue_types.*','issue_statuses.*','issue_priorities.*','users.name')
        ->where('tasks.assignee','=',$id)
        ->orderby('tasks.priority','tasks.due_date','tasks.status')->get();
        return $task;

        }else{
            return redirect('/');
        }
    }
    public function index()
    {
        
        //return $tasks;
        return view('tasks.viewTasks')->with('tasks',$this->getTasks());

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
           // $assignees[0]->notify(new TaskCreated);
            Log::info('Showing user profile for user: '.$id);
            //return  $assignees[0];
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
        //return $request->input('taskType');
        $now = new DateTime($request->input('taskDueDate'));
        $date=$now->format('Y-m-d H:i:s');
        if (Auth::check()) {
            $task = Task::create([
                'issue_type' => $request->input('taskType'),
                'subject' => $request->input('taskSubject'),
                'description' => $request->input('taskDescription'),
                'key' => $request->input('taskDescription'),
                'assignee' =>$request->input('assignee'),
                'status' =>$request->input('taskStatus'),
                'priority' =>$request->input('taskpriority'),
                'due_date' =>$date,
                'registed_by' => Auth::user()->id
            ]);


            if ($task) {
                // $assignees[0]->notify(new TaskCreated);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function generatePDF()
    {
        
        /** @var \Barryvdh\Snappy\PdfWrapper $pdf */
        $pdf = App::make('snappy.pdf.wrapper');

        // The view data.
        $data = ['title' => 'Liam Muroiwa'];
        // Generate the PDF output.
        $output = $pdf->loadView('pdf.myPDF', $data)->output();
        // The file name.
        $name = 'Report.pdf';
        // Get our disk to store the PDF in.
        $disk = Storage::disk('public/pdf');
        // Save the file with the PDF output.
        if ($disk->put($name, $output)) {
            // Successfully stored. Return the full path.
            return $disk->path($name);
        }
                
        $data = ['title' => 'Liam Muroiwa'];
        $pdf = PDF::loadView('pdf.myPDF', $data);
       // $pdf->save(storage_path().'_filename.pdf');
        Storage::put('public/pdf/name.pdf', $pdf->output()) ;
        return $pdf->download('itsolutionstuff.pdf');
    }
    public function html_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }

}

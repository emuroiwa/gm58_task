@extends('layouts.master') 
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tasks</h1>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active">Add Task</li>
                </ol>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Task</h3>
                            </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            {{--  <form role="form">  --}}
                            <form method="post" action="{{ route('tasks.store') }}"  role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="taskType">Task Type</label><a href="{!! route('pdf') !!}">xxx</a>
                                            <select class="form-control" style="width:40%" id="taskType" name="taskType" required>
                                                <option></option>
                                                @foreach ($data['types'] as $type)
                                                    <option value="{{$type['id']}}">{{$type['issue_type_name']}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="taskSubject" placeholder="Subject" name="taskSubject" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="taskDescription">Description</label>
                                            <textarea rows="12" class="form-control" id="taskDescription" name="taskDescription" required></textarea>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-2">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>New</label>
                                                <input type="text" class="form-control" id="taskStatus" name="taskStatus" value="1" hidden>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Assignee</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                 <select class="form-control select2" style="width: 100%;" name="assignee" required>
                                                     <option></option>
                                                    @foreach ($data['assignees'] as $type)
                                                        <option value="{{$type['id']}}">{{$type['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-2">
                                        <div class="col-sm-2">
                                            <label>Due Date</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taskDueDate" name="taskDueDate" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Priority</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <select class="form-control" style="width:40%" id="taskType" name="taskpriority" required>
                                                    <option></option>
                                                    @foreach ($data['priorities'] as $type)
                                                        <option value="{{$type['id']}}">{{$type['issue_priority_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Submit"/>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('javascript')
<!-- dataTables -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="/dist/js/adminlte.js"></script>
<script>
    $('#taskDueDate').datepicker({format: 'yyyy-mm-dd'});
    $('#taskDueDate').on('changeDate', function(ev){
        $(this).datepicker('hide');
    });
</script>
{{-- <script>
          //Initialize Select2 Elements
    $(function () {
        $('.select2').select2()
    });
</script> --}}
@endsection
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
                                        <label for="taskType">Task Type</label>
                                            <select class="form-control" style="width:40%" id="taskType" name="taskType">
                                                <option value="1">Task</option>
                                                <option value="2">Change Request</option>
                                                <option value="3">Other</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="taskSubject" placeholder="Subject" name="taskSubject">
                                    </div>
                                    <div class="form-group">
                                            <label for="taskDescription">Description</label>
                                            <textarea rows="12" class="form-control" id="taskDescription" name="taskDescription"></textarea>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-2">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taskSubject" placeholder="Subject" value="New" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Assignee</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                 <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option disabled="disabled">California (disabled)</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-2">
                                        <div class="col-sm-2">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taskSubject" placeholder="Subject" value="New" disabled>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <label>Status</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="taskSubject" placeholder="Subject" value="New" disabled>
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
                                    <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
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
<script>
          //Initialize Select2 Elements
    $(function () {
        $('.select2').select2()
    });
</script>
@endsection
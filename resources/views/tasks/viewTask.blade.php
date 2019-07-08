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
                <div class="callout callout-info">
                    <div class="row">
                        <div class="col-6">
                          <h4>{{ $task["subject"] }}</h4>
                          <span class="badge bg-info"> {{ $task["issue_type"] }}</span>
                        </div>
                        <div class="col-6 text-right">
                            <p> <span class="badge bg-danger">Due Date</span> {{ $task["due_date"] }}<p>
                            <span class="badge bg-info"> {{ $task["status"] }}</span>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">
                                <i class="fas fa-user"></i>
                                {{ $task["registed_by"] }}
                              </h3>
                                  Created At {{$task["created_at"]}}
                            </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <p>
                                  {{$task["description"]}}
                                </p>
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                          {{$task["status"]}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <label>Assignee</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            {{$task["status"]}}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-2">
                                    <div class="col-sm-2">
                                        <label>Due Date</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                          {{$task["status"]}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-2">
                                        <label>Priority</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                          {{$task["priority"]}}
                                        </div>
                                    </div>
                                </div>
                              </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
    </div>
@endsection
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">{{ $task["subject"] }}</h3>
                            <span class="float-right badge bg-danger" style="align:right">842</span>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


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
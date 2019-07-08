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
              <li class="breadcrumb-item active">Tasks</li>
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
                    <h3 class="card-title">Tasks</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tableTasks" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Issue Type</th>
                                    <th>Subject</th>
                                    <th>Assignee</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created</th>
                                    <th>Due Date</th>
                                    <th>Updated</th>
                                    <th>Registed By</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $tasks)
                                    <tr>
                                        <td><a href="/tasks/{{$tasks->task_id}}">{{ $tasks->key }}</a></td>
                                        <td><span class="badge bg-info">{{ $tasks->issue_type_name }}</span></td>
                                        <td>{{ $tasks->subject }}</td>
                                        <td>{{ $tasks->assignee }}</td>
                                        <td><span class="badge bg-success">{{ $tasks->issue_status_name }}</span></td>
                                        <td><span class="badge bg-danger">{{ $tasks->issue_priority_name }}</span></td>
                                        <td>{{ $tasks->created_at }}</td>
                                        <td>{{ $tasks->due_date }}</td>
                                        <td>{{ $tasks->updated_at }}</td>
                                        <td><i class="fas fa-user"></i> {{ $tasks->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Key</th>
                                    <th>Issue Type</th>
                                    <th>Subject</th>
                                    <th>Assignee</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Created</th>
                                    <th>Due Date</th>
                                    <th>Updated</th>
                                    <th>Registed By</th>
                                </tr>
                            </tfoot>
                        </table>
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

@section('javascript')
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="/dist/plugins/datatables/jquery.dataTables.js"></script>
<script src="/dist/plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="/dist/js/adminlte.js"></script>

<script>
        $(function () {
          $("#tableTasks").DataTable();
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
          });
        });
      </script>
@stop
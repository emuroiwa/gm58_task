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
                                        <td><a href="/tasks/{{$tasks->id}}">{{ $tasks->key }}</a></td>
                                        <td>{{ $tasks->issue_type }}</td>
                                        <td>{{ $tasks->subject }}</td>
                                        <td>{{ $tasks->description }}</td>
                                        <td>{{ $tasks->assignee }}</td>
                                        <td>{{ $tasks->status }}</td>
                                        <td>{{ $tasks->priority }}</td>
                                        <td>{{ $tasks->due_date }}</td>
                                        <td>{{ $tasks->updated_at }}</td>
                                        <td>{{ $tasks->registed_by }}</td>
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
<!-- dataTables -->
<script src="/dist/plugins/jquery/jquery.min.js"></script>
<script src="/dist/plugins/datatables/jquery.dataTables.js"></script>
<script src="/dist/plugins/datatables/dataTables.bootstrap4.js"></script>
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
@extends('layouts.master')
@section('title', 'Starter')
@section('header')
  <h1>
      Dashboard
  </h1>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Task List</h3>
        <div class="btn-group btn-group-xs pull-right">
            <a href="{{route('addTask')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Task</a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $task)
            <tr>
                <td>{{$task['name']}}</td>
                <td>{{date('d-m-Y', strtotime($task['start_date']))}}</td>
                <td>{{date('d-m-Y', strtotime($task['due_date']))}}</td>
                <td><span class="label {{$taskColor[$task['status']]}}">{!!  array_get($datav['status'],$task->status) !!}</span></td>
                <td><span class="label {{$pColor[$task['priority']]}}">{!!  array_get($datav['priority'],$task->priority) !!}</span></td></td>
                <td><a href="{{ route('editTask', $task['id'])}}" class="btn btn-default"><i class="fa fa-edit"></i>Edit</a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
          <th>Name</th>
          <th>Start Date</th>
          <th>Due Date</th>
          <th>Status</th>
          <th>Priority</th>
          <th>Actions</th>
        </tr>
        </tfoot>
        </table>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable();
    });
</script>
@endsection

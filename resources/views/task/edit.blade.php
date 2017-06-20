@extends('layouts.master')
@section('title', 'Edit Task')
@section('header')
  <h1>
      Add Task
  </h1>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Edit Task</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        {!! Form::open(['url' => route('putTask'),'method' => 'PUT']) !!}
        <input type="hidden" name="id" class="form-control" value="{{$data['id']}}" required>
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" name="name" class="form-control" value="{{$data['name']}}" required>
          </div>
          <div class="form-group">
              <label for="start_date">Status *</label>
              <select class="form-control" name="status">
                <option value="0" {{ $data['status']==0? 'selected':'' }}>Open</option>
                <option value="1" {{ $data['status']==1? 'selected':'' }}>In Progress</option>
                <option value="2" {{ $data['status']==2? 'selected':'' }}>Completed</option>
              </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Start Date *</label>
              <input type="text" name="start_date" class="date form-control" value="{{date('d-m-Y', strtotime($data['start_date']))}}" required>
          </div>
          <div class="form-group">
              <label for="start_date">Priority *</label>
              <select class="form-control" name="priority">
              <option value="0" {{ $data['priority']==0? 'selected':'' }}>Normal</option>
              <option value="1" {{ $data['priority']==1? 'selected':'' }}>Important</option>
              <option value="2" {{ $data['priority']==2? 'selected':'' }}>Urgent</option>
              </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Due Date *</label>
              <input type="text" name="due_date" class="date form-control" value="{{date('d-m-Y', strtotime($data['due_date']))}}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <label for="description">Description *</label>
              <textarea name="description" class="form-control" name="description">{{$data['description']}}</textarea>
          </div>
        </div>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <a href="{{ url()->previous() }}" class="btn btn-white">Cancel</a>
                <button class="btn btn-primary" type="submit">Save changes</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function(){
  $('.date').datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: "dd-mm-yyyy"
  });
});
</script>
@endsection

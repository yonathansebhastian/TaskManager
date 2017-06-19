@extends('layouts.master')
@section('title', 'Starter')
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
        <h3 class="box-title">Add Task</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        {!! Form::open(['url' => route('postTask'),'method' => 'POST']) !!}
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Name *</label>
              <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="start_date">Status *</label>
              <select class="form-control" name="status" required>
                <option disabled selected hidden>--Select Status--</option>
                <option value="0">Open</option>
                <option value="1">In Progress</option>
                <option value="2">Completed</option>
              </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Start Date *</label>
              <input type="text" name="start_date" class="form-control date" value="{{date('d-m-Y')}}" required>
          </div>
          <div class="form-group">
              <label for="start_date">Priority *</label>
              <select class="form-control" name="priority" required>
              <option disabled selected hidden>--Select Priority--</option>
              <option value="0">Normal</option>
              <option value="1">Important</option>
              <option value="2">Urgent</option>
              </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label for="name">Due Date *</label>
              <input type="text" name="due_date" class="form-control date" value="{{date('d-m-Y')}}" required>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
              <label for="description">Description *</label>
              <textarea name="description" class="form-control" name="description" required></textarea>
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

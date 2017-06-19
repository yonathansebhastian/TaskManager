<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
      parent::__construct();
    }

    public function createTask(){
      return view('task/add');
    }

    public function postTask(Request $request)
    {
      $request['start_date'] = date('Y-m-d', strtotime( $request['start_date']));
      $request['due_date'] = date('Y-m-d', strtotime( $request['due_date']));
      $input = array_except($request->all(), ['_token', '_method']);
      Task::create($input);
      return redirect()->route('dashboard');
    }

    public function editTask($id)
    {
      $data = Task::find($id);

      return view('task/edit', compact('data'));
    }

    public function putTask(Request $request)
    {
      $task = Task::find($request['id']);
      $request['start_date'] = date('Y-m-d', strtotime( $request['start_date']));
      $request['due_date'] = date('Y-m-d', strtotime( $request['due_date']));
      $input = array_except($request->all(), ['_token', '_method', 'id']);
      $task->update($input);
      return redirect()->route('dashboard');
    }
}

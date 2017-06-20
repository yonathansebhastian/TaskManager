<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Task;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  public function __construct()
  {
    date_default_timezone_set('Asia/Bangkok');
    $datav['dueTasks'] = Task::whereDay('due_date', date('d'))->whereNotIn('status', [2])->get();
    $datav['status'] = [
        0 => 'Open',
        1 => 'In Progress',
        2 => 'Completed'
    ];
    $datav['priority'] = [
        0 => 'Normal',
        1 => 'Important',
        2 => 'Urgent'
    ];
    View::share('datav', $datav);
  }

  public function index()
  {

    $taskColor[0] = 'label-primary'; //open
    $taskColor[1] = 'label-info'; //inprogress
    $taskColor[2] = 'label-success'; //completed

    $pColor[0] = 'label-default';
    $pColor[1] = 'label-warning';
    $pColor[2] = 'label-danger';

    $data = Task::all();
    return view('admin', compact('data', 'taskColor', 'pColor'));

  }
}

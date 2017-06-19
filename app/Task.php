<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
    protected $fillable = ['name', 'status', 'priority', 'start_date', 'due_date', 'description'];
}

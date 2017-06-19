<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tasks')->insert([
                  'name' => 'Laravel Ops',
                  'start_date' => date("Y-m-d H:i:s"),
                  'due_date' => date("Y-m-d H:i:s",strtotime("+2 days")),
                  'status' => 2,
                  'priority' =>1,
                  'description'=>'Explore Laravel Documentation',
                  'created_at'=>date("Y-m-d H:i:s"),
                  'updated_at'=>date("Y-m-d H:i:s")
              ]);
    }
}

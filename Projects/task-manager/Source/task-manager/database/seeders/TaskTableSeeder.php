<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            ['name' => 'Buy groceries', 'priority' => 1, 'project_id' => 1],
            ['name' => 'Finish report', 'priority' => 2, 'project_id' => 2],
            ['name' => 'Read chapter 3', 'priority' => 3, 'project_id' => 3],
            ['name' => 'Call mom', 'priority' => 4, 'project_id' => 1],
            ['name' => 'Prepare presentation', 'priority' => 5, 'project_id' => 2],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}

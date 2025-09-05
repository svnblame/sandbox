<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index(): string
    {
        return view('tasks.index')->with('tasks', Task::all());
    }
}

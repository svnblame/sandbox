<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

use function Illuminate\Filesystem\join_paths;

class TaskController extends Controller
{
    public function index(): string
    {
        return view('tasks.index')->with('tasks', Task::all());
    }

    public function create(): Factory|View
    {
        return view('tasks.create');
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        Task::create($request->only(['name', 'description']));

        return redirect('tasks');
    }

    public function show(Task $task)
    {
       return view('tasks.show')->with('task', $task);
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('tasks');
    }
}

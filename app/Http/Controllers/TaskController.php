<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(15);

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403);
        }

        $statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        return view('tasks.create', compact('statuses', 'users', 'labels'));
    }

    public function store(StoreTaskRequest $request)
    {
        if (Auth::guest()) {
            return redirect()->route('tasks.index');
        }

        $validated = $request->validated();
        $createdById = Auth::id();
        $data = [...$validated, 'created_by_id' => $createdById];

        $task = new Task();
        $task->fill($data);
        $task->save();

        $message = __('controllers.task_create');
        flash($message)->success();
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        return view('tasks.edit', compact('statuses', 'users', 'labels', 'task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if (Auth::guest()) {
            return redirect()->route('tasks.index');
        }

        $validated = $request->validated();
        $createdById = Auth::id();
        $data = [...$validated, 'created_by_id' => $createdById];

        $task->fill($data);
        $task->save();

        $message = __('controllers.task_update');
        flash($message)->success();
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if (Auth::id() === $task->created_by_id) {
            $task->delete();
            flash(__('controllers.tasks_destroy'))->success();
        }
        return redirect()->route('tasks.index');
    }
}

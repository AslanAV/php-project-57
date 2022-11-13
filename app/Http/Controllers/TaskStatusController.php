<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    public function index()
    {
        $taskStatuses = TaskStatus::paginate(15);
        return view('taskStatuses.index', compact('taskStatuses'));
    }

    public function create()
    {
        if (Auth::guest()) {
            return abort(403);
        }
        return view('taskStatuses.create');
    }

    public function store(StoreTaskStatusRequest $request)
    {
        if (Auth::guest()) {
            return redirect()->route('task_statuses.index');
        }
        $validated = $request->validated();
        $taskStatus = new TaskStatus();
        $taskStatus->fill($validated);
        $taskStatus->save();
        flash('Статус успешно создан')->success();

        return redirect()->route('task_statuses.index');
    }

    public function edit(TaskStatus $taskStatus)
    {
        return view('taskStatuses.edit', compact('taskStatus'));
    }

    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        if (Auth::guest()) {
            return redirect()->route('task_statuses.index');
        }

        $validated = $request->validated();

        $taskStatus->fill($validated);
        $taskStatus->save();
        flash('Статус успешно изменен')->success();

        return redirect()->route('task_statuses.index');
    }

    public function destroy(TaskStatus $taskStatus)
    {
        $taskStatus->delete();
        flash('Статус успешно удален')->success();
        return redirect()->route('task_statuses.index');
    }
}

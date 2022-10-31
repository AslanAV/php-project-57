<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskStatusRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\Response;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskStatusRequest $request
     * @return Response
     */
    public function store(StoreTaskStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param TaskStatus $taskStatus
     * @return Response
     */
    public function show(TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TaskStatus $taskStatus
     * @return Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTaskStatusRequest $request
     * @param TaskStatus $taskStatus
     * @return Response
     */
    public function update(UpdateTaskStatusRequest $request, TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TaskStatus $taskStatus
     * @return Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        //
    }
}

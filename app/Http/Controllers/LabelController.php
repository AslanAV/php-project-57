<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Http\Response;

class LabelController extends Controller
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
     * @param StoreLabelRequest $request
     * @return Response
     */
    public function store(StoreLabelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Label $label
     * @return Response
     */
    public function show(Label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Label $label
     * @return Response
     */
    public function edit(Label $label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLabelRequest $request
     * @param Label $label
     * @return Response
     */
    public function update(UpdateLabelRequest $request, Label $label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Label $label
     * @return Response
     */
    public function destroy(Label $label)
    {
        //
    }
}

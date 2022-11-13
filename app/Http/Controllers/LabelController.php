<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLabelRequest;
use App\Http\Requests\UpdateLabelRequest;
use App\Models\Label;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LabelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $labels = Label::paginate(15);
        return view('labels.index', compact('labels'));
    }

    public function create()
    {

        return view('labels.create');
    }

    public function store(StoreLabelRequest $request)
    {
        if (Auth::check()) {
            abort(403);
        }

        $validated = $request->validated();

        $label = new Label();
        $label->fill($validated);
        $label->save();
        flash('Метка успешно создана')->success();

        return redirect()->route('labels.index');
    }

    public function edit(Label $label)
    {
        return view('labels.edit', compact('label'));
    }

    public function update(UpdateLabelRequest $request, Label $label)
    {
        $validated = $request->validated();

        $label->fill($validated);
        $label->save();
        flash('Метка успешно изменена')->success();

        return redirect()->route('labels.index');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        flash('Метка успешно удалена')->success();
        return redirect()->route('labels.index');
    }
}

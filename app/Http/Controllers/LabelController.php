<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LabelController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $labels = Label::paginate(5);
        return view('labels.index', compact('labels'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $label = new Label();
        return view('labels.create', compact('label'));
    }

    /**
     * @param LabelRequest $request
     * @return RedirectResponse
     */
    public function store(LabelRequest $request): RedirectResponse
    {
        $label = new Label();
        $label->fill($request->validated());
        $label->save();
        flash(__('flash.labels.store.success'))->success();

        return redirect()->route('labels.index');
    }

    /**
     * @param Label $label
     * @return View
     */
    public function edit(Label $label): View
    {
        return view('labels.edit', compact('label'));
    }

    /**
     * @param LabelRequest $request
     * @param Label $label
     * @return RedirectResponse
     */
    public function update(LabelRequest $request, Label $label): RedirectResponse
    {
        $label->update($request->validated());
        flash(__('flash.labels.update.success'))->success();

        return redirect()->route('labels.index');
    }

    public function destroy(Label $label)
    {
        if ($label->tasks->isNotEmpty()) {
            flash(__('flash.labels.destroy.failed'))->error();
            return back();
        }

        $label->delete();
        flash(__('flash.labels.destroy.success'))->success();

        return redirect()->route('labels.index');
    }
}

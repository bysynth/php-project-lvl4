<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStatusRequest;
use App\Models\TaskStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class, 'task_status');
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $taskStatuses = TaskStatus::paginate(5);
        return view('task_statuses.index', compact('taskStatuses'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $taskStatus = new TaskStatus();
        return view('task_statuses.create', compact('taskStatus'));
    }

    /**
     * @param TaskStatusRequest $request
     * @return RedirectResponse
     */
    public function store(TaskStatusRequest $request): RedirectResponse
    {
        $taskStatus = new TaskStatus();
        $taskStatus->fill($request->validated());
        $taskStatus->save();
        flash(__('flash.task_statuses.store.success'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return View
     */
    public function edit(TaskStatus $taskStatus): View
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * @param TaskStatusRequest $request
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     */
    public function update(TaskStatusRequest $request, TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->fill($request->validated());
        $taskStatus->save();
        flash(__('flash.task_statuses.update.success'))->success();

        return redirect()->route('task_statuses.index');
    }

    /**
     * @param TaskStatus $taskStatus
     * @return RedirectResponse
     */
    public function destroy(TaskStatus $taskStatus): RedirectResponse
    {
        $taskStatus->delete();
        flash(__('flash.task_statuses.destroy.success'))->success();

        return redirect()->route('task_statuses.index');
    }
}

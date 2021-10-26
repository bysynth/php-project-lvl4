<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $task = new Task();
        $taskStatuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('tasks.create', compact('task', 'taskStatuses', 'users'));
    }

    /**
     * @param TaskRequest $request
     * @return RedirectResponse
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $task = new Task();
        $task->fill($request->validated());
        $task->creator()->associate(Auth::user());
        $task->save();
        flash(__('flash.tasks.store.success'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return View
     */
    public function show(Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        $taskStatuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'taskStatuses', 'users'));
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update($request->validated());
        flash(__('flash.tasks.update.success'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        flash(__('flash.tasks.destroy.success'))->success();

        return redirect()->route('tasks.index');
    }
}

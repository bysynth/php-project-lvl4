<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }

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
        $labels = Label::pluck('name', 'id');

        return view('tasks.create', compact('task', 'taskStatuses', 'users', 'labels'));
    }

    /**
     * @param TaskRequest $request
     * @return RedirectResponse
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        $task = new Task();
        $validated = $request->validated();
        $task->fill($validated);
        $task->creator()->associate(Auth::user());
        $task->save();

        $labels = array_filter($validated['labels']);
        $task->labels()->attach($labels);

        flash(__('flash.tasks.store.success'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return View
     */
    public function show(Task $task): View
    {
        $labels = $task->labels;
        return view('tasks.show', compact('task', 'labels'));
    }

    /**
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        $taskStatuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'taskStatuses', 'users', 'labels'));
    }

    /**
     * @param TaskRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $validated = $request->validated();
        $task->update($validated);

        $labels = array_filter($validated['labels']);
        $task->labels()->sync($labels);

        flash(__('flash.tasks.update.success'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->labels()->detach();
        $task->delete();

        flash(__('flash.tasks.destroy.success'))->success();

        return redirect()->route('tasks.index');
    }
}

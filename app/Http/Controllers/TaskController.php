<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Task::class, 'task');
    }


    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $filter = $request->input('filter');
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id')
            ])
            ->paginate(5)
            ->withQueryString();
        $taskStatusesFilterData = TaskStatus::pluck('name', 'id');
        $usersFilterData = User::pluck('name', 'id');

        return view('tasks.index', compact('filter', 'tasks', 'taskStatusesFilterData', 'usersFilterData'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $task = new Task();
        $taskStatusesFormData = TaskStatus::pluck('name', 'id');
        $usersFormData = User::pluck('name', 'id');
        $labelsFormData = Label::pluck('name', 'id');

        return view('tasks.create', compact('task', 'taskStatusesFormData', 'usersFormData', 'labelsFormData'));
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

        $labels = array_filter($validated['labels'] ?? []);
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
        $taskStatusesFormData = TaskStatus::pluck('name', 'id');
        $usersFormData = User::pluck('name', 'id');
        $labelsFormData = Label::pluck('name', 'id');

        return view('tasks.edit', compact('task', 'taskStatusesFormData', 'usersFormData', 'labelsFormData'));
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

        $labels = array_filter($validated['labels'] ?? []);
        $task->labels()->sync($labels ?? []);

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

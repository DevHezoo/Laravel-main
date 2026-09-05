<?php

namespace App\Http\Controllers\Frontend\Functions;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display all tasks (with optional project filter)
     */
    public function index(Request $request)
    {
        $projects = Project::orderBy('name')->get();
        $selectedProject = $request->query('project');

        $tasks = Task::with('project')
            ->forProject($selectedProject)
            ->ordered()
            ->get();

        return view('pages.home.content.index', [
            'tasks' => $tasks,
            'projects' => $projects,
            'selectedProject' => $selectedProject,
        ]);
    }

    /**
     * Show create task form
     */
    public function create()
    {
        $projects = Project::orderBy('name')->get();
        return view('pages.home.content.create', compact('projects'));
    }

    /**
     * Store a new task – priority assigned per project group
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'exists:projects,id'],
        ]);

        // [FIX] Use per‑project max priority
        $maxPriority = Task::getMaxPriorityForProject($validated['project_id']);
        $validated['priority'] = $maxPriority + 1;

        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(Task $task)
    {
        $projects = Project::orderBy('name')->get();
        return view('pages.home.content.edit', compact('task', 'projects'));
    }

    /**
     * Update a task
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'exists:projects,id'],
        ]);

        // If project changed, we need to recalc priorities for both old and new project groups
        $oldProject = $task->project_id;
        $task->update($validated);

        // Recalculate priorities for the old project (if it had tasks) and new project
        if ($oldProject !== $task->project_id) {
            Task::recalculatePriorities($oldProject);
        }
        Task::recalculatePriorities($task->project_id);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Delete a task and recalc priorities for its project group
     */
    public function destroy(Task $task)
    {
        $projectId = $task->project_id;
        $task->delete();

        // [FIX] Recalculate only the project group the task belonged to
        Task::recalculatePriorities($projectId);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }

    /**
     * Reorder tasks – supports both global and per‑project reordering.
     * Expects 'order' (array of task IDs) and optionally 'project' (ID or null).
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'order' => ['required', 'array'],
            'order.*' => ['integer', 'exists:tasks,id'],
            'project' => ['nullable', 'exists:projects,id'], // project filter sent from front‑end
        ]);

        $projectId = $validated['project'] ?? null;

        // [FIX] If project is specified, we only update tasks belonging to that project
        // and assign priorities 1..N within that group.
        foreach ($validated['order'] as $priority => $taskId) {
            $task = Task::find($taskId);
            // Optional: verify that the task belongs to the given project (if specified)
            if ($projectId !== null && $task->project_id != $projectId) {
                continue; // skip (should not happen if front‑end is correct)
            }
            $task->priority = $priority + 1;
            $task->save();
        }

        // Optional: recalc to ensure no gaps (but we already set consecutive numbers)
        // If project is specified, we can recalc that group to be safe:
        if ($projectId !== null) {
            Task::recalculatePriorities($projectId);
        }

        return response()->json(['success' => true]);
    }
}
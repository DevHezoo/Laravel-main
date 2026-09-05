@extends('pages.home.page')

@section('title', 'Tasks')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Task
    </a>
</div>

<!-- Project Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('tasks.index') }}" class="row g-3 align-items-end">
            <div class="col-auto">
                <label for="project" class="form-label">Filter by Project</label>
                <select name="project" id="project" class="form-select" onchange="this.form.submit()">
                    <option value="">All Projects</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ $selectedProject == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @if ($selectedProject)
                <div class="col-auto">
                    <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Clear Filter</a>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Task List -->
@if ($tasks->count())
    <div class="card">
        <div class="card-body">
            <ul id="task-list" class="list-group">
                @foreach ($tasks as $task)
                    <li class="list-group-item task-item d-flex justify-content-between align-items-center" data-id="{{ $task->id }}">
                        <div>
                            <span class="badge bg-secondary me-2">#{{ $task->priority }}</span>
                            <strong>{{ $task->name }}</strong>
                            @if ($task->project)
                                <span class="badge bg-info ms-2">{{ $task->project->name }}</span>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@else
    <div class="alert alert-info">No tasks found. Create one now!</div>
@endif
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        const taskList = document.getElementById('task-list');
        if (taskList) {
            Sortable.create(taskList, {
                animation: 150,
                handle: '.task-item',
                onEnd: function(evt) {
                    const items = Array.from(taskList.children);
                    const order = items.map(item => item.dataset.id);
                    // [FIX] Send the current project filter along with the order
                    const project = '{{ $selectedProject }}'; // may be empty string
                    $.ajax({
                        url: '{{ route("tasks.reorder") }}',
                        type: 'POST',
                        data: {
                            order: order,
                            project: project, // added
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                items.forEach((item, index) => {
                                    const badge = item.querySelector('.badge.bg-secondary');
                                    if (badge) {
                                        badge.textContent = '#' + (index + 1);
                                    }
                                });
                            }
                        },
                        error: function() {
                            alert('Reordering failed. Please refresh and try again.');
                        }
                    });
                }
            });
        }
    });
</script>
@endpush
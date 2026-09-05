@extends('pages.home.page')

@section('title', 'Create Task')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Task</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">
                    Task Name <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="project_id" class="form-label">
                    Project (optional)
                </label>

                <select
                    class="form-select @error('project_id') is-invalid @enderror"
                    id="project_id"
                    name="project_id"
                >
                    <option value="">None</option>

                    @foreach ($projects as $project)
                        <option
                            value="{{ $project->id }}"
                            {{ old('project_id') == $project->id ? 'selected' : '' }}
                        >
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>

                @error('project_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</div>

@endsection

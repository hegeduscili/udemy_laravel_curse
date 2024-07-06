@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create new Task!')

@section('content')
    {{-- {{$errors}} --}}
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="long_description" class="form-label">Long Description</label>
            <textarea class="form-control" id="long_description" rows="3" name="long_description">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit">
                @isset($task)
                Update Task
                @else
                Create Task
                @endisset
            </button>
        </div>
    </form>
@endsection

@extends('layouts.app')

@section('title', $task->title)


@section('content')

    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Completed
        @else
            Not Completed
        @endif
    </p>

    <div>
        <a class="btn btn-primary mb-2" href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
    </div>

    <div>
        <form method="POST" action="{{ route('tasks.toggleComplete', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-primary mb-2">Mark as
                {{ $task->completed ? 'Not Completed' : 'Completed' }}</button>
        </form>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Task</button>
        </form>
    </div>
@endsection

@extends('layouts.app')


@section('title', 'The list of tasks')


@section('content')

    <div>
        <a href="{{route('tasks.create')}}" class="btn btn-success">Add tasks</a>
    </div>

    @forelse ($tasks as $task)
        <div>
            <a href="{{route('tasks.show',['task' => $task->id])}}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        {{$tasks->links('vendor.pagination.bootstrap-5')}}
    @endif
@endsection

@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/find.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/share.css') }}">
@endsection



@section('title')
    Todo List - Find
@endsection



@section('textbox')
    <form action="{{ route('find') }}" method="POST">
    @csrf
        <div class="ListedTasks">
            <input type="text" name="content" value="{{request('content')}}" placeholder="type the name of task you might have added before">
            <button class="btn-add">find!</button>
        </div>
    </form>
    <button class="btn-find" onclick="location.href='{{ route('index') }}'">home</button>
@endsection



@section('content')

    @if (isset($tasks))
    @foreach ($tasks as $task)
    <tr>
        <td><img src="/img/favicons.png" alt=""></td>
        {{-- update --}}
        <form action="{{ route('update', ['id' => $task->id]) }}" method="post">
        @csrf
            <td><input type="text" name="content" value="{{ $task->content }}"></td>
            <td><button class="btn-update">update</button></td>
        </form>
        {{-- delete --}}
        <form action="{{ route('delete', ['id' => $task->id]) }}" method="post">
        @csrf
            <td><button class="btn-delete">delete</button></td>
            <td><input class="delete" type="hidden" name="content" value="{{ $task->content }}"></td>
        </form>
    </tr>
    @endforeach
    @endif

@endsection

@extends('layout')

@section('title')
    Todo List
@endsection



@section('textbox')
    {{-- confirm before create --}}
    @foreach ($errors->all() as $error)
    <ul>
        <li class="error_message">{{$error}}</li>
    </ul>
    @endforeach
    <form action="{{ route('confirm') }}" method="get">
    @csrf
        <div class="ListedTasks create">
            <table class="create-table">
                <tr>
                    <th>task : </th>
                    <td><input type="text" name="content" placeholder="add something you need to do ~~"></td>
                </tr>
                <tr>
                    <th>deadline : </th>
                    <td><input type="text" name="deadline" placeholder="by when?"></td>
                </tr>
            </table>
            <button onclick="location.href='{{ route('confirm') }}'"  class="btn-add">confirm</button>
        </div>
    </form>
    {{-- find --}}
    <button class="btn-find" onclick="location.href='{{ route('tofind') }}'">wanna find?</button>
@endsection



@section('content')
    @foreach ($items as $item)
        <tr>
            <td><img src="/img/favicons.png" alt=""></td>
            <td>{{ $item->created_at }}</td>
            {{-- deadline --}}
            <form action="{{ route('update', ['id' => $item->deadline]) }}" method="post" class="deadline">
            @csrf
                <td><input type="text" name="deadline" value="{{ $item->deadline }}"></td>
            </form>
            {{-- update --}}
            <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
            @csrf
                <td><input type="text" name="content" value="{{ $item->content }}"></td>
                <td><button class="btn-update">update</button></td>
            </form>
            {{-- delete --}}
            <form action="{{ route('delete', ['id' => $item->id]) }}" method="post">
            @csrf
                <td><button class="btn-delete">delete</button></td>
                <td><input class="delete" type="hidden" name="content" value="{{ $item->content }}"></td>
            </form>
        </tr>
    @endforeach
@endsection

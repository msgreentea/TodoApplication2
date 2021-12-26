@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/share.css') }}">
@endsection


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
        </div>
        <button onclick="location.href='{{ route('confirm') }}'"  class="btn-add btn-confirm">confirm</button>
    </form>
    {{-- find --}}
    <button class="btn-find" onclick="location.href='{{ route('tofind') }}'">find</button>
@endsection



@section('content')

    <div class="ListedTasks">
        <table>
            <tr>
                <th></th>
                <th>created date</th>
                <th>task</th>
                <th>deadline</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td><img src="/img/favicons.png" alt=""></td>
                <td>{{ $item->created_at }}</td>
                {{-- update --}}
                <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
                @csrf
                    <td><input type="text" name="content" value="{{ $item->content }}"></td>
                    <td><input type="text" name="deadline" value="{{ $item->deadline }}"></td>
                    <td><button class="btn-update">update</button></td>
                </form>
                {{-- delete --}}
                <form action="{{ route('delete', ['id' => $item->id]) }}" method="post">
                    @csrf
                    <td><button class="btn-delete">delete</button></td>
                    <td><input type="hidden" name="content" value="{{ $item->content }}"></td>
                    <td><input type="hidden" name="content" value="{{ $item->deadline }}"></td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

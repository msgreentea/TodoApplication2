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
                    <td label=""><input type="text" name="content" placeholder="add something you need to do ~~"></td label="">
                </tr>
                <tr>
                    <th>deadline : </th>
                    <td label=""><input type="text" name="deadline" placeholder="by when?"></td label="">
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
        {{-- パソコン --}}
        <table class="table-pc">
            <tr>
                <th></th>
                <th>created date</th>
                <th>task</th>
                <th>deadline</th>
                <th>status</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            @foreach ($items as $item)
            <tr>
                <td><img src="/img/favicons.png" alt=""></td label="">
                {{-- <td label="">{{ $item->created_at }}</td label=""> --}}
                <td label="created date">{{ $item->created_at->format('Y-m-d') }} <span class="hms">{{ $item->created_at->format('H:i:s') }}</span></td>
                {{-- update --}}
                <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
                    @csrf
                    <td label="task"><input type="text" name="content" value="{{ $item->content }}"></td>
                    <td label="deadline"><input type="text" name="deadline" value="{{ $item->deadline }}"></td>
                    {{-- status --}}
                    <td label="status">
                        <select name="status" id="select" class="select">
                            @if ($item->status === "new")
                                <option value="new" selected>new</option>
                            @else
                                <option value="new">new</option>
                            @endif

                            <option value="inProgress" @if($item->status === "inProgress") selected @endif>in progress</option>
                            <option value="completed" @if($item->status === "completed") selected @endif>completed</option>
                        </select>
                    </td>
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
        {{-- スマホ --}}
        <table class="table-smart-phone">
            @foreach ($items as $item)
            <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
            <tr>
                <th>created date</th>
                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                <th>task</th>
                <td><input type="text" name="content" value="{{ $item->content }}"></td>
                <th>deadline</th>
                <td><input type="text" name="deadline" value="{{ $item->deadline }}"></td>
            </tr>
            <tr>
                <td label="status">
                    <select name="status" id="select" class="select">
                        @if ($item->status === "new")
                            <option value="new" selected>new</option>
                        @else
                            <option value="new">new</option>
                        @endif

                        <option value="inProgress" @if($item->status === "inProgress") selected @endif>in progress</option>
                        <option value="completed" @if($item->status === "completed") selected @endif>completed</option>
                    </select>
                </td>
                <td><button class="btn-update">update</button></td>
            </tr>
            </form>

            @endforeach
        </table>
    </div>
    <div class="pagination">
        {{ $items->links() }}
    </div>

@endsection

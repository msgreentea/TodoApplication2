<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="shortcut icon" href="/img/snoopy.svg" type="image/x-icon">
<title>Todo List</title>
</head>

<body>
    <div class="beige">
        <div class="container">
            <h1 class="title">Todo List</h1>
            @foreach ($errors->all() as $error)
                <ul>
                    <li class="error_message">{{$error}}</li>
                </ul>
            @endforeach
            <form action="{{ route('create') }}" method="POST">
            @csrf
                <div class="ListedTasks">
                    <input type="text" name="content" placeholder="add something you need to do ~~">
                    <button class="btn-add">add</button>
                </div>
            </form>
            {{-- 検索 --}}
            <form action="{{ route('find') }}" class="find ListedTasks" method="POST">
            @csrf
                <input type="search" name="find" value="{{ request('content') }}" placeholder="type the name of task 8^)">
                <button class="btn-find">find</button>
            </form>
            {{-- @if (@isset($items))
            <table>
                <tr>
                    <th>task</th>
                </tr>
                <tr>
                    <td><input type="text" value="{{ $items->content }}"></td>
                </tr>
            </table>
            @endif --}}

            {{-- list of todos --}}
            <div class="ListedTasks">
                <table>
                    <tr>
                        <th></th>
                        <th>created date</th>
                        <th>task</th>
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
                </table>
            </div>
        </div>
    </div>
</body>

</html>

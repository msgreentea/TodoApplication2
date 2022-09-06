@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/find.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/share.css') }}">
@endsection



@section('title')
    ToDoリスト - 検索ページ
@endsection



@section('textbox')
    <form action="{{ route('find') }}" method="POST">
    @csrf
        <div class="input_task center">
            <input type="text" name="content" value="{{ request('content')}}" placeholder="追加済みタスクを入力">
            <button class="btn-send center">検索</button>
        </div>
        @error('content')
            <p class="error_message">{{ $message }}</p>
        @enderror
    </form>
    <button class="btn-long" onclick="location.href='{{ route('index') }}'">ホーム画面に戻る</button>
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
            <td><button class="btn-update">更新</button></td>
        </form>
        {{-- delete --}}
        <form action="{{ route('delete', ['id' => $task->id]) }}" method="post">
        @csrf
            <td><button class="btn-delete">削除</button></td>
            <td><input class="delete" type="hidden" name="content" value="{{ $task->content }}"></td>
        </form>
    </tr>
    @endforeach
    @endif

@endsection

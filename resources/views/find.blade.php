@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/find.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/style.css') }}"> --}}
@endsection



@section('title')
    ToDoリスト - 検索ページ
@endsection


<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    追加フォーム（※上部分）
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  -->
@section('textbox')
    <form action="{{ route('find') }}" method="POST">
        @csrf
        <div class="input_task center">
            <p class="left">
                <input type="text" name="content" placeholder="追加済みタスクを入力">
            </p>
            <p class="right">
                <button class="btn-send center">検索</button>
            </p>
        </div>
        @error('content')
            <p class="error_message red">{{ $message }}</p>
        @enderror
    </form>
    <button class="btn-long" onclick="location.href='{{ route('index') }}'">ホーム画面に戻る</button>
@endsection


<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    検索結果（※下部分）
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  -->
@section('content')

@if (isset($tasks))
        <table class="listed_tasks center">
            <tr>
                <th width="15%">タスク作成日</th>
                <th width="20%">タスク</th>
                <th width="20%">期限</th>
                <th class="action" width="10%">状態</th>
                <th class="action" width="15%">更新</th>
                <th class="action" width="15%">削除</th>
            </tr>
            @foreach ($tasks as $task)
            <tr>
                <td label="created date">
                    {{ $task->created_at->format('Y / m / d') }}
                </td>
            <form action="{{ route('update', ['id' => $task->id]) }}" method="post">
                @csrf
                <td label="task"><input class="listed_input" type="text" name="content" value="{{ $task->content }}"></td>
                <td label="deadline"><input class="listed_input" type="text" name="deadline" value="{{ $task->deadline }}"></td>
                <td label="status">
                    <select name="status" id="select">
                        @if ($task->status === "見着手")
                            <option value="見着手" selected>見着手</option>
                        @else
                            <option value="見着手">見着手</option>
                        @endif

                        <option value="進行中" @if($task->status === "進行中") selected @endif>進行中</option>
                        <option value="完了" @if($task->status === "完了") selected @endif>完了</option>
                    </select>
                </td>
                <td><button class="btn-update">更新してホームへ戻る</button></td>
            </form>
            <form action="{{ route('delete', ['id' => $task->id]) }}" method="post">
                @csrf
                <td><button class="btn-delete">削除してホームへ戻る</button></td>
                <input type="hidden" name="content" value="{{ $task->content }}">
                <input type="hidden" name="content" value="{{ $task->deadline }}">
            </form>
            </tr>
            @endforeach
        </table>
@elseif (session('result'))
    <br><p class="red">{{ session('result') }}</p>
@endif
@endsection

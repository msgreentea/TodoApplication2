@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection



@section('title')
ToDoリスト - 確認画面
@endsection



@section('content')
    <form action="{{ route('create') }}" method="post">
    @csrf
        <div class="input_task center">
            <p class="left">
                タスク :
            </p>
            <p class="right">
                {{-- {{ $content }} --}}
                <input type="text" value="{{ $content }}">
                <input type="hidden" name="content" value="{{ $content }}">
            </p>
        </div>
        <div class="input_task center">
            <p class="left">
                期限 :
            </p>
            <p class="right">
                {{-- {{ $deadline }} --}}
                <input type="text" value="{{ $deadline }}">
                <input type="hidden" name="deadline" value="{{ $deadline }}">
            </p>
        </div>
        <input type="hidden" name="status" value="new">
        <div class="btns">
            <button class="btn-send center">タスクを作成する</button>
        </div>
    </form>
    <button class="btn-long" onclick="location.href='{{ route('index') }}';return false;">ホームに戻る</button>

@endsection

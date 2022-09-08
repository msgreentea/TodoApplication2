@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
@endsection


@section('title')
    ToDoリスト - ホーム
@endsection


<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    追加フォーム（※上部分）
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  -->
@section('textbox')
    <form action="{{ route('confirm') }}" method="get">
        @csrf
        <div class="input_task center">
            <p class="left">
                タスク :
            </p>
            <p class="right">
                <input type="text" name="content" placeholder="追加するタスクを入力">
            </p>
        </div>
        @error('content')
            <p class="error_message red">{{ $message }}</p>
        @enderror
        <div class="input_task center">
            <p class="left">
                期限 :
            </p>
            <p class="right">
                <input type="text" name="deadline" placeholder="期限を入力">
            </p>
        </div>
        @error('deadline')
            <p class="error_message red">{{ $message }}</p>
        @enderror
        <button onclick="location.href='{{ route('confirm') }}'"  class="btn-send btn-confirm center">確認画面へ</button>
    </form>
    {{-- find --}}
    <button class="btn-long" onclick="location.href='{{ route('tofind') }}'">検索ページへ</button>
@endsection


<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    追加済みタスクたち（※下部分）
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  -->
@section('content')
    {{-- * * * * * * * * * * * * * * * * * * * * * pc * * * * * * * * * * * * * * * * * * * * * --}}
    <table class="listed_tasks center pc">
        <tr>
            {{-- <th></th> --}}
            <th width="15%">タスク作成日</th>
            <th width="25%">タスク</th>
            <th width="25%">期限</th>
            <th width="10%">状態</th>
            <th width="7%">更新</th>
            <th width="7%">削除</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            {{-- <td><img src="/img/favicons.png" alt=""></td label=""> --}}
            <td width="15%">
                {{ $item->created_at->format('Y / m / d') }}
            </td>
            {{-- update --}}
            <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
                @csrf
                <td label="task" width="25%">
                    <input class="listed_input" type="text" name="content" value="{{ $item->content }}">
                </td>
                <td label="deadline" width="25%">
                    <input class="listed_input" type="text" name="deadline" value="{{ $item->deadline }}">
                </td>
                {{-- status --}}
                <td label="status" width="10%" class="">
                    <select name="status" id="select" class="center">
                        @if ($item->status === "見着手")
                            <option value="見着手" selected>見着手</option>
                        @else
                            <option value="見着手">見着手</option>
                        @endif

                        <option value="進行中" @if($item->status === "進行中") selected @endif>進行中</option>
                        <option value="完了" @if($item->status === "完了") selected @endif>完了</option>
                    </select>
                    {{-- <select name="status" id="select">
                        @if ($item->status === "new")
                            <option value="new" selected>new</option>
                        @else
                            <option value="new">new</option>
                        @endif

                        <option value="inProgress" @if($item->status === "inProgress") selected @endif>in progress</option>
                        <option value="completed" @if($item->status === "completed") selected @endif>completed</option>
                    </select> --}}
                </td>
                <td><button class="btn-update" width="7%">更新</button></td>
            </form>
            {{-- delete --}}
            <form action="{{ route('delete', ['id' => $item->id]) }}" method="post">
                @csrf
                <td><button class="btn-delete" width="7%">削除</button></td>
                <input type="hidden" name="content" value="{{ $item->content }}">
                <input type="hidden" name="content" value="{{ $item->deadline }}">
            </form>
        </tr>
        @endforeach
    </table>

    {{-- * * * * * * * * * * * * * * * * * * * * * mobile * * * * * * * * * * * * * * * * * * * * * --}}
    <table class="listed_tasks center mobile">
        <tr>
            {{-- <th></th> --}}
            <th width="12%">タスク作成日</th>
            <th width="15%">タスク</th>
            <th width="15%">期限</th>
            <th width="8%">状態</th>
            {{-- <th width="8%">更新</th>
            <th width="8%">削除</th> --}}
        </tr>
        @foreach ($items as $item)
        <tr>
            {{-- <td><img src="/img/favicons.png" alt=""></td label=""> --}}
            <td width="12%">
                {{ $item->created_at->format('m / d') }}
            </td>
            {{-- update --}}
            <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
                @csrf
                <td label="task" width="15%">
                    <input class="listed_input" type="text" name="content" value="{{ $item->content }}">
                </td>
                <td label="deadline" width="15%">
                    <input class="listed_input" type="text" name="deadline" value="{{ $item->deadline }}">
                </td>
                {{-- status --}}
                <td label="status" width="8%" class="">
                    <select name="status" id="select" class="center">
                        @if ($item->status === "見着手")
                            <option value="見着手" selected>見着手</option>
                        @else
                            <option value="見着手">見着手</option>
                        @endif

                        <option value="進行中" @if($item->status === "進行中") selected @endif>進行中</option>
                        <option value="完了" @if($item->status === "完了") selected @endif>完了</option>
                    </select>
                    {{-- <select name="status" id="select">
                        @if ($item->status === "new")
                            <option value="new" selected>new</option>
                        @else
                            <option value="new">new</option>
                        @endif

                        <option value="inProgress" @if($item->status === "inProgress") selected @endif>in progress</option>
                        <option value="completed" @if($item->status === "completed") selected @endif>completed</option>
                    </select> --}}
                </td>
        </tr>
        <tr>
                <td colspan="2"><button class="btn-update" width="45%">更新</button></td>
            </form>
            {{-- delete --}}
            <form action="{{ route('delete', ['id' => $item->id]) }}" method="post">
                @csrf
                <td colspan="2"><button class="btn-delete" width="45%">削除</button></td>
                <input type="hidden" name="content" value="{{ $item->content }}">
                <input type="hidden" name="content" value="{{ $item->deadline }}">
            </form>
        </tr>
        @endforeach
    </table>


    <div class="pagination">
        {{ $items->links() }}
    </div>

@endsection

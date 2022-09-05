@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/share.css') }}">
@endsection


@section('title')
    ToDoリスト
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
        <div class="create_task">
            <table>
                <tr>
                    <th>タスク : </th>
                    <td><input type="text" name="content" placeholder="追加するタスクを入力"></td>
                </tr>
                <tr>
                    <th>期限 : </th>
                    <td><input type="text" name="deadline" placeholder="期限を入力"></td>
                </tr>
            </table>
        </div>
        <button onclick="location.href='{{ route('confirm') }}'"  class="btn-add btn-confirm">確認画面へ</button>
    </form>
    {{-- find --}}
    <button class="btn-find" onclick="location.href='{{ route('tofind') }}'">追加済みタスクを検索</button>
@endsection



@section('content')

    <div class="ListedTasks">
        {{-- パソコン --}}
        <table class="table-pc">
            <tr>
                {{-- <th></th> --}}
                <th>タスク作成日</th>
                <th>タスク</th>
                <th>期限</th>
                <th>状態</th>
                <th>更新</th>
                <th>削除</th>
            </tr>
            @foreach ($items as $item)
            <tr>
                {{-- <td><img src="/img/favicons.png" alt=""></td label=""> --}}
                {{-- <td label="">{{ $item->created_at }}</td label=""> --}}
                <td label="created date">{{ $item->created_at->format('Y / m / d') }}
                    {{-- <span class="hms">{{ $item->created_at->format('H:i:s') }}</span> --}}
                </td>
                {{-- update --}}
                <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
                    @csrf
                    <td label="task"><input class="listed-input" type="text" name="content" value="{{ $item->content }}"></td>
                    <td label="deadline"><input class="listed-input" type="text" name="deadline" value="{{ $item->deadline }}"></td>
                    {{-- status --}}
                    <td label="status">
                        <select name="status" id="select" class="select">
                            @if ($item->status === "追加済み")
                                <option value="追加済み" selected>追加済み</option>
                            @else
                                <option value="追加済み">追加済み</option>
                            @endif

                            <option value="進行中" @if($item->status === "進行中") selected @endif>進行中</option>
                            <option value="完了" @if($item->status === "完了") selected @endif>完了</option>
                        </select>
                        {{-- <select name="status" id="select" class="select">
                            @if ($item->status === "new")
                                <option value="new" selected>new</option>
                            @else
                                <option value="new">new</option>
                            @endif

                            <option value="inProgress" @if($item->status === "inProgress") selected @endif>in progress</option>
                            <option value="completed" @if($item->status === "completed") selected @endif>completed</option>
                        </select> --}}
                    </td>
                    <td><button class="btn-update">更新</button></td>
                </form>
                {{-- delete --}}
                <form action="{{ route('delete', ['id' => $item->id]) }}" method="post">
                    @csrf
                    <td><button class="btn-delete">削除</button></td>
                    <td><input type="hidden" name="content" value="{{ $item->content }}"></td>
                    <td><input type="hidden" name="content" value="{{ $item->deadline }}"></td>
                </form>
            </tr>
            @endforeach
        </table>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
            スマホ
        * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  -->
        <table class="table-smart-phone">
            @foreach ($items as $item)
            <form action="{{ route('update', ['id' => $item->id]) }}" method="post">
            <tr>
                <th>作成日</th>
                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                <th>タスク</th>
                <td><input type="text" name="content" value="{{ $item->content }}"></td>
                <th>期限</th>
                <td><input type="text" name="deadline" value="{{ $item->deadline }}"></td>
            </tr>
            <tr>
                <td label="status">
                    <select name="status" id="select" class="select">
                        @if ($item->status === "追加済み")
                            <option value="追加済み" selected>追加済み</option>
                        @else
                            <option value="追加済み">追加済み</option>
                        @endif

                        <option value="進行中" @if($item->status === "進行中") selected @endif>進行中</option>
                        <option value="完了" @if($item->status === "完了") selected @endif>完了</option>
                    </select>
                </td>
                <td><button class="btn-update">更新</button></td>
            </tr>
            </form>

            @endforeach
        </table>
    </div>
    <div class="pagination">
        {{ $items->links() }}
    </div>

@endsection

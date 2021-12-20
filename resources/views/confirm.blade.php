@extends('layout')

@section('content')

@foreach ($items as $item)
    <tr>
        <td><img src="/img/favicons.png" alt=""></td>
        <td>{{ $item->created_at }}</td>
        {{-- update --}}
        <form action="{{ route('update', ['id' => $item->   id]) }}" method="post">
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

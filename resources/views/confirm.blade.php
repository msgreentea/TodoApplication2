@extends('layout')


@section('css')
<link rel="stylesheet" href="{{ asset('/css/share.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/confirm.css') }}">
@endsection



@section('title')
Todo List - Confimation
@endsection



@section('content')

    <form action="{{ route('create') }}" method="post">
    @csrf
        <table>
            <tr>
                <th>task  :  </th>
                <td>{{ $content }}</td>
                <input type="hidden" name="content" value="{{$content}}">
            </tr>
            <tr>
                <th>deadline  :  </th>
                <td>{{ $deadline }}</td>
                <input type="hidden" name="deadline" value="{{$deadline}}">
            </tr>
                <input type="hidden" name="status" value="new">
        </table>
        <div class="btns">
            {{-- <a href=""></a> to index --}}
            <button class="btn-add btn-alongside">add!</button>
        </div>
    </form>
    <button class="btn-update btn-alongside" onclick="location.href='{{ route('index') }}';return false;">previous</button>

@endsection

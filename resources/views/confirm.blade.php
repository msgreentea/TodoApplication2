@extends('layout')


@section('css')
<link rel="stylesheet" href="{{ asset('/css/share.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/confirm.css') }}">
@endsection



@section('title')
Todo List - Confimation
@endsection



@section('content')

    <table>
        <form action="{{ route('create') }}" method="post">
        @csrf
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
    </table>
    <div class="btns">
        <button class="btn-add btn-alongside">add!</button>
        </form>
    <button class="btn-update btn-alongside" onclick="location.href='{{ route('index') }}'">previous</button>
    </div>

@endsection

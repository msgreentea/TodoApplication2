@extends('layout')


@section('css')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/share.css') }}">
@endsection


@section('title')
    Todo List - Confimation
@endsection


@section('content')
{{--
<div class="ListedTasks">
</div> --}}
    {{-- <table>
    </table> --}}
    <tr>
        <th>task</th>
        <th>deadline</th>
    </tr>
    <tr>
        <form action="{{ route('create') }}" method="post">
            @csrf
            <td>{{ $content }}</td>
            <td>{{ $deadline }}</td>
            <td><button class="btn-add btn-alongside">add!</button></td>
        </tr>
        </form>
    <button class="btn-update btn-alongside" onclick="location.href='{{ route('index') }}'">previous</button>

@endsection

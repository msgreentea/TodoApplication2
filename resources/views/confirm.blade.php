@extends('layout')

@section('content')

<table>
    <tr>
        <th>task</th>
        <th>deadline</th>
        <th>edit</th>
        <th>create</th>
    </tr>
    <tr>
        <td>{{ $items->content }}</td>
        <td>{{ $items->deadline }}</td>
        <td><button class="btn-update">edit</button></td>
        <td><button class="btn-add">add</button></td>
    </tr>
</table>

@endsection

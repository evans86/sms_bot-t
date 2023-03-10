@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Публичный ключ</th>
                <th scope="col">Приватный ключ</th>
                <th scope="col">Bot-t ID</th>
                <th scope="col">Версия</th>
                <th scope="col">API ключ</th>
                <th scope="col">ID категории</th>
                <th scope="col">Процент</th>
                <th scope="col">Создан</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($bots as $bot)
                <tr>
                    <td>{{ $bot->id }}</td>
                    <td>{{ $bot->public_key }}</td>
                    <td>{{ $bot->private_key }}</td>
                    <td>{{ $bot->bot_id }}</td>
                    <td>{{ $bot->version }}</td>
                    <td>{{ $bot->api_key }}</td>
                    <td>{{ $bot->category_id }}</td>
                    <td>{{ $bot->percent }} %</td>
                    <td>{{ $bot->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $bots->links() !!}
        </div>
    </div>
@endsection

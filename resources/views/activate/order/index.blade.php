@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Сервис ID</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">Страна</th>
                <th scope="col">Оператор</th>
                <th scope="col">Статус</th>
                <th scope="col">Коды</th>
                <th scope="col">Создан</th>
                <th scope="col">Создан в сервисе</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->org_id }}</td>
                    <td>{{ $order->user->telegram_id }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->operator }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->codes }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->time }}</td>
                    {{\Carbon\Carbon::parse($order->time)->format('d M Y')}}
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $orders->links() !!}
        </div>
    </div>
@endsection

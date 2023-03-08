@extends('layouts.main')
@section('content')

    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Сервис</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($products as $key => $product)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $product }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

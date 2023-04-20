@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ресурс</th>
                <th scope="col">API Key</th>
                <th scope="col">Режим работы</th>
                <th scope="col">Создан</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->resource->title }}</td>
                    <td>{{ $resource->api_key }}</td>
                    <td>{{ $resource->work_mode }}</td>
                    <td>{{ $bot->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $resources->links() !!}
        </div>
    </div>
@endsection

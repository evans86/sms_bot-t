@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <div class="d-grid gap-2 d-md-block mb-2">
            <a href="{{ route('activate.resource.create') }}" class="btn btn-success">Добавить ресурс</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Назваие</th>
                <th scope="col">Icon</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->title }}</td>
                    <td><img src={{ $resource->image }} width="24">
                    </td>
                    <td>{{ $resource->created_at }}</td>
                    <td>
                        <form action="{{ route('activate.resource.delete', $resource->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Ref</th>
                <th scope="col">Icon</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->title }}</td>
                    <td>{{ $resource->ref }}</td>
                    <td><img src={{ $resource->image }} width="24">
                    </td>
                    <td>{{ $resource->created_at }}</td>
                    <td>
                        <form action="{{ route('activate.resource.edit', $resource->id) }}" method="get">
                            @method('update')
                            <input type="submit" class="btn btn-primary" value="Изменить">
                        </form>
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

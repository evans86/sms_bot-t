@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Ключ #1</th>
                <th scope="col">Ключ #2</th>
                <th scope="col">Icon</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->first_key }}</td>
                    <td>{{ $service->second_key }}</td>
                    <td><img src={{ $service->image }} width="24">
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form action="{{ route('activate.service.edit', $service->id) }}" method="get">
                                @method('update')
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </form>
                            <form action="{{ route('activate.service.destroy', $service->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Удалить">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $services->links() !!}
        </div>
    </div>
@endsection

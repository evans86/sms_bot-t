@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <div class="d-grid gap-2 d-md-block mb-2">
            <a href="{{ route('activate.countries.all-update') }}" class="btn btn-success">Добавить/Обновить данные</a>
            <a href="{{ route('activate.countries.all-delete') }}" class="btn btn-danger">Удалить все</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ID Activate</th>
                <th scope="col">RU</th>
                <th scope="col">EN</th>
                <th scope="col">Icon</th>
                <th scope="col">Добалено</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->org_id }}</td>
                    <td>{{ $country->name_ru }}</td>
                    <td>{{ $country->name_en }}</td>
                    <td><img src={{ $country->image }} width="24">
                    </td>
                    <td>{{ $country->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form action="{{ route('activate.countries.update', $country->id) }}" method="get">
                                @method('update')
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </form>
                            <form action="{{ route('activate.countries.delete', $country->id) }}" method="post">
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
            {!! $countries->links() !!}
        </div>
    </div>
@endsection


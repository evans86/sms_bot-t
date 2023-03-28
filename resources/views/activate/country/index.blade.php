@extends('layouts.main')
@section('content')
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">RU</th>
                <th scope="col">EN</th>
                <th scope="col">ISO2</th>
                <th scope="col">ISO3</th>
                <th scope="col">Icon</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->name_ru }}</td>
                    <td>{{ $country->name_en }}</td>
                    <td>{{ $country->iso_two }}</td>
                    <td>{{ $country->iso_three }}</td>
                    <td><img src={{ $country->image }} width="24">
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form action="{{ route('activate.country.edit', $country->id) }}" method="get">
                                @method('update')
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </form>
                            <form action="{{ route('activate.country.destroy', $country->id) }}" method="post">
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


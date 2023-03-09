@extends('layouts.main')
@section('content')
    <div class="container mt-5">
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
                    <td> <img src="https://sms-activate.org/assets/ico/country/{{ $country->org_id }}.png" width="24"></td>
                    <td>{{ $country->created_at }}</td>
                    <td>
                        <a class="btn btn-success" href="{{ route('activate.operators.index', $country->org_id) }}" role="button">Операторы</a>
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


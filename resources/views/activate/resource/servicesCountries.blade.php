@extends('layouts.main')
@section('content')
    {{--    <x-resource-top :resource="$resource"/>--}}
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ресурс</th>
                <th scope="col">Страна</th>
                <th scope="col">Сервис</th>
                <th scope="col">Цена</th>
                <th scope="col">Остаток</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @php
                /** @var \App\Models\Resource\ResourceServiceCountry[] $resourceServicesCountries */
            @endphp
            @foreach($resourceServicesCountries as $resourceServiceCountry)
                <tr>
                    <td>{{ $resourceServiceCountry->id }}</td>
                    <td>{{ $resourceServiceCountry->resource->title }}</td>
                    <td>{{ $resourceServiceCountry->country->name_ru }}</td>
                    <td>{{ $resourceServiceCountry->service->title }}</td>
                    <td>{{ $resourceServiceCountry->price }}</td>
                    <td>{{ $resourceServiceCountry->count }}</td>
                    <td>{{ $resourceServiceCountry->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $resourceServicesCountries->links() !!}
        </div>
    </div>
@endsection

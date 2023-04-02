@extends('layouts.main')
@section('content')
    <x-resource-top :resource="$resource"/>

    <form action="{{ route('activate.resource.countryReset', $resource->id) }}" method="get">
        @method('countryGenerate')
        <input type="submit" class="btn btn-info" value="Сгенерировать страны">
    </form>
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Страна</th>
                <th scope="col">Org_id</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @php
                use App\Models\Resource\ResourceCountry;
                    /** @var ResourceCountry[] $resourceCountries */
            @endphp
            @foreach($resourceCountries as $resourceCountry)
                <tr>
                    <td>{{ $resourceCountry->id }}</td>
                    <td>{{ $resourceCountry->country_id }}</td>
                    <td>{{ $resourceCountry->org_id }}</td>
                    <td>{{ $resourceCountry->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

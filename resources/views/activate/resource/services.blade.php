@extends('layouts.main')
@section('content')
{{--    <x-resource-top :resource="$resource"/>--}}

    <form action="{{ route('activate.resource.servicesReset', $resource->id) }}" method="get">
        @method('servicesReset')
        <input type="submit" class="btn btn-info" value="Сгенерировать сервисы">
    </form>
    <div class="container mt-2">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Сервис</th>
                <th scope="col">Org_id</th>
                <th scope="col">Image</th>
                <th scope="col">created_at</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            @php
                /** @var \App\Models\Resource\ResourceService[] $resourceServices */
            @endphp
            @foreach($resourceServices as $resourceService)
                <tr>
                    <td>{{ $resourceService->id }}</td>
                    <td>{{ $resourceService->service_id }}</td>
                    <td>{{ $resourceService->org_id }}</td>
                    <td><img src={{ $resourceService->service->image }} width="24"></td>
                    <td>{{ $resourceService->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex">
            {!! $resourceServices->links() !!}
        </div>
    </div>
@endsection

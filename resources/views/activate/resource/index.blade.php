@extends('layouts.main')
@section('content')
    <form action="{{ route('activate.resource.updateServicesCountries') }}" method="get">
        @method('updateServicesCountries')
        <input type="submit" class="btn btn-info" value="Генерация актуальных">
    </form>
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
            @php
                /** @var \App\Models\Resource\SmsResource[] $resources */
            @endphp
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->title }}</td>
                    <td>{{ $resource->ref }}</td>
                    <td><img src={{ $resource->image }} width="70">
                    </td>
                    <td>{{ $resource->created_at }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <form action="{{ route('activate.resource.country', $resource->id) }}" method="get">
                                @method('country')
                                <input type="submit" class="btn btn-info" value="Страны">
                            </form>
                            <form action="{{ route('activate.resource.services', $resource->id) }}" method="get">
                                @method('services')
                                <input type="submit" class="btn btn-warning" value="Сервисы">
                            </form>
                            <form action="{{ route('activate.resource.resourceServicesCountries', $resource->id) }}" method="get">
                                @method('resourceServicesCountries')
                                <input type="submit" class="btn btn-success" value="Актуальные">
                            </form>
{{--                            <form action="{{ route('activate.resource.country', $resource->id) }}" method="get">--}}
{{--                                @method('country')--}}
{{--                                <input type="submit" class="btn btn-primary" value="Боты">--}}
{{--                            </form>--}}
                            <form action="{{ route('activate.resource.edit', $resource->id) }}" method="get">
                                @method('update')
                                <input type="submit" class="btn btn-primary" value="Изменить">
                            </form>
                            <form action="{{ route('activate.resource.destroy', $resource->id) }}" method="post">
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
    </div>
@endsection

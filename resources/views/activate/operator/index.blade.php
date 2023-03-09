@extends('layouts.main')
@section('content')
    <div class="container mt-5">
{{--        @if( $countryOperators == null)--}}
{{--            <h1>Нет доступных операторов</h1>--}}
{{--        @else--}}
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Service ID</th>
                    <th scope="col">Оператор</th>
                    <th scope="col">Страна</th>
                    <th scope="col">Добавлен</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($countryOperators as $countryOperator)
                    <tr>
                        <td>{{ $countryOperator->id }}</td>
                        <td>{{ $countryOperator->org_id }}</td>
                        <td>{{ $countryOperator->title }}</td>
                        <td>{{ $countryOperator->country_id }}</td>
                        <td>{{ $countryOperator->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--        @endif--}}
    </div>
@endsection

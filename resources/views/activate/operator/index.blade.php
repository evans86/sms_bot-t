@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        @if( $countryOperators == null)
            <h1>Нет доступных операторов</h1>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Оператор</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                @foreach($countryOperators as $key => $operator)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $operator }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

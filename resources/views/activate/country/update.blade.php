@extends('layouts.main')
@section('content')
    {{ $country->name_en }}<img src={{ $country->image }} width="24">
@endsection

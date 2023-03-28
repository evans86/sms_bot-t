@extends('layouts.main')
@section('content')
    <div>
        @php
            /** @var \App\Models\Activate\SmsCountry $country */
        @endphp
        <form action="{{ route('activate.country.update', $country->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">RU Name</label>
                <input type="text" name="name_ru" value="{{ $country->name_ru }}" class="form-control" id="exampleInputTitle">

                @error('name_ru')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">En Name</label>
                <input type="text" name="name_en" value="{{ $country->name_en }}" class="form-control" id="exampleInputTitle">

                @error('name_en')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">ISO 2</label>
                <input type="text" name="iso_two" value="{{ $country->iso_two }}" class="form-control" id="exampleInputTitle">

                @error('iso_two')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">ISO 3</label>
                <input type="text" name="iso_three" value="{{ $country->iso_three }}" class="form-control" id="exampleInputTitle">

                @error('iso_three')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Image</label>
                <input type="text" name="image" value="{{ $country->image }}" class="form-control" id="exampleInputTitle">

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection

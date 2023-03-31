@extends('layouts.main')
@section('content')
    <div>
        @php
            /** @var \App\Models\Service\SmsService $service */
        @endphp
        <form action="{{ route('activate.service.update', $service->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Название</label>
                <input type="text" name="title" value="{{ $service->title }}" class="form-control" id="exampleInputTitle">

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Ключ #1</label>
                <input type="text" name="first_key" value="{{ $service->first_key }}" class="form-control" id="exampleInputTitle">

                @error('first_key')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Ключ #2</label>
                <input type="text" name="second_key" value="{{ $service->second_key }}" class="form-control" id="exampleInputTitle">

                @error('second_key')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Image</label>
                <input type="text" name="image" value="{{ $service->image }}" class="form-control" id="exampleInputTitle">

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection


@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('activate.resource.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Название ресурса</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputTitle">

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Image</label>
                <input type="text" name="image" value="{{ old('image') }}" class="form-control" id="exampleInputTitle">

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection

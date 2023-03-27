@extends('layouts.main')
@section('content')
    <div>
        @php
            /** @var \App\Models\Resource\SmsResource $resource */
        @endphp
        <form action="{{ route('activate.resource.update', $resource->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Название ресурса</label>
                <input type="text" name="title" value="{{ $resource->title }}" class="form-control" id="exampleInputTitle">

                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Image</label>
                <input type="text" name="image" value="{{ $resource->image }}" class="form-control" id="exampleInputTitle">

                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputTitle" class="form-label">Ref</label>
                <input type="text" name="ref" value="{{ $resource->ref }}" class="form-control" id="exampleInputTitle">

                @error('ref')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection

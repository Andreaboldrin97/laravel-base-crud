@extends('layout.main')

@section('name', 'comic/create')


@section('main-content')
    <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ $route }}">
        @method($method)
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label text-white">TITLE</label>
            @error('title')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="title" class="form-control" required value="{{ old('title', $comic->title) }}"
                id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-white">DESCRIPTION</label>
            @error('description')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <textarea class="form-control" name="description" id="description" rows="3" required>
            {{ old('description', $comic->description) }}
        </textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label text-white">IMAGE_URL</label>
            @error('image_url')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="image_url" class="form-control" id="image_url" required
                value="{{ old('image_url', $comic->image_url) }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label text-white">PRICE</label>
            <input type="text" name="price" class="form-control" id="price" required
                value="{{ old('price', $comic->price) }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label text-white">SERIES</label>
            @error('series')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="series" class="form-control" id="series" required
                value="{{ old('series', $comic->series) }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label text-white">SALE_DATE</label>
            @error('sale_data')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="date" name="sale_date" class="form-control" id="sale_date" required
                value="{{ old('sale_date', $comic->sale_date) }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label text-white">TYPE</label>
            @error('type')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <select name="type" id="type">
                @foreach ($types as $type)
                    @if (isset($comic))
                        <option value="{{ $type->type_name }}"
                            {{ $type->type_name == old('type', $comic->type) ? 'selected' : '' }}>
                            {{ ucwords($type->type_name) }}</option>
                    @else
                        <option value="{{ $type->type_name }}">
                            {{ ucwords($type->type_name) }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection

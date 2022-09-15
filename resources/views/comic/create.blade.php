@extends('layout.main')

@section('name', 'comic/create')


@section('main-content')
    @if (isset($comic))
        <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ route('comics.update', $comic->id) }}">
            @method('PATCH')
        @else
            <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ route('comics.store') }}">
    @endif

    @csrf

    <div class="mb-3">
        <label for="title" class="form-label text-white">TITLE</label>
        <input type="text" name="title" class="form-control" value="{{ $comic->title ?? '' }}" id="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label text-white">DESCRIPTION</label>
        <textarea class="form-control" name="description" id="description" rows="3">
            {{ $comic->description ?? '' }}
        </textarea>
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label text-white">IMAGE_URL</label>
        <input type="text" name="image_url" class="form-control" id="image_url" value="{{ $comic->image_url ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label text-white">PRICE</label>
        <input type="text" name="price" class="form-control" id="price" value="{{ $comic->price ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="series" class="form-label text-white">SERIES</label>
        <input type="text" name="series" class="form-control" id="series" value="{{ $comic->series ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="sale_date" class="form-label text-white">SALE_DATE</label>
        <input type="date" name="sale_date" class="form-control" id="sale_date" value="{{ $comic->sale_date ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="type" class="form-label text-white">TYPE</label>
        <select name="type" id="type">
            @foreach ($types as $type)
                @if (isset($comic))
                    <option value="{{ $type->type_name }}" {{ $type->type_name == $comic->type ? 'selected' : '' }}>
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

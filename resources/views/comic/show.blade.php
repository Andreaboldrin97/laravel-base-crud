@extends('layout.main')

@section('name', $comic->slug)



@section('main-content')
    <div class="card text-center col-8 offset-2 ">
        @if (session('create'))
            <div class="alert alert-success">
                {{ session('create') }} : questo elemento è stato creato corettamente
            </div>
        @endif

        <div class="card-header">
            COMIC N: {{ $comic->id }}
        </div>
        <div class="my-3">
            <img class="w-50" src="{{ $comic->image_url }}" class="card-img-top" alt="imge {{ $comic->title }}">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $comic->title }}</h5>
            <p class="card-text">{{ $comic->description }}</p>
            <p>PRICE : {{ $comic->price }} $</p>
            <P>TYPE : {{ $comic->type }}</P>
            <P>SERIES : {{ $comic->series }}</P>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <div class="mx-3">
                <a class="btn btn-success" href="{{ route('comics.edit', $comic->slug) }}">
                    Edit
                </a>
            </div>
            <div class="mx-3">
                <form action="{{ route('comics.destroy', $comic->slug) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" type="submit">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

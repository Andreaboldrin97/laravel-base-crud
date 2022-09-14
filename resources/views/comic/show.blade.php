@extends('layout.main')

@section('name', 'comic')

@section('main-content')
    <div class="card text-center col-8 offset-2 ">
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
        <div class="card-footer text-muted">

        </div>
    </div>
@endsection

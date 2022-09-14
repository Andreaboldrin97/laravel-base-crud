@extends('layout.main')

@section('name', 'comic')

@section('main-content')
    ELEMENT IN DB-COMIC
    <div class="mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>SERIE</th>
                <th>TYPE</th>
                <th></th>
            </thead>
            <tbody>
                @forelse ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>
                            <a href="{{ route('comics.show', $comic->slug) }}">
                                {{ $comic->title }}</a>
                        </td>
                        <td>{{ $comic->description }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->type }}</td>
                        <td>
                            <a class="btn btn-success">
                                edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Non ci sono fumetti da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

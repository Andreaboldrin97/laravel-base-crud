@extends('layout.main')

@section('name', 'comic')

@section('main-content')
    ELEMENT IN DB-COMIC
    <div class="mt-3">
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }} : questo elemento è stato cancellato corettamente
            </div>
        @endif
        <table class="table table-dark table-striped">
            <thead>
                <th>ID</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>SERIE</th>
                <th>TYPE</th>
                <th></th>
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
                            <a class="btn btn-success" href="{{ route('comics.edit', $comic->slug) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('comics.destroy', $comic->slug) }}" class="delete-method" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Non ci sono fumetti da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

{{-- SCRIP SECTION --}}
@section('script-main')
    <script>
        const deleteElement = document.querySelectorAll(".delete-method");
        deleteElement.forEach(elementForm => {
            elementForm.addEventListener('submit', function(event) {
                event.preventDefault();
                const result = window.confirm(`vuoi eliminare l'elemento ?`);
                if (result) this.submit();
            })
        });
    </script>
@endsection

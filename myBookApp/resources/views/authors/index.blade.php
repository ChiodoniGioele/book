@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <a href="{{ route('authors.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un'Autore</a>
            <div class="col-md-12 my-4">
                <h2 class="mt-5 mb-4">Gli Autori</h2>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="w-auto">#</th>
                        <th scope="col" class="w-50">Autore</th>
                        <th scope="col" class="w-25">Data di Nascita</th>
                        <th scope="col" class="w-auto text-end">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $author->name }}</td>
                            <td class="align-middle">{{ \Carbon\Carbon::parse($author->birthdate)->format('d M Y') }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Sei Sicuro? Stai eliminando un Autore?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </main>
@endsection

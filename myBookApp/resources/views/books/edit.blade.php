@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Libri</a>
                    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Autori</a>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Categorie</a>
                </div>
                <h2 class="mt-5 mb-4">Modifica il Libro: {{ $book->title }}</h2>
            </div>
            <div class="col-md-5">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Token di sicurezza -->
                    @method('PUT') <!-- Indica che stiamo facendo una richiesta PUT -->

                    <div class="mb-3 form-floating">
                        <input type="text" name="title" class="form-control" id="title" placeholder="Il nome della Rosa" value="{{ old('title', $book->title) }}" required>
                        <label for="title">Titolo</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <textarea name="description" class="form-control textarea-height" placeholder="Inserisci la descrizione" id="description">{{ old('description', $book->description) }}</textarea>
                        <label for="description">Descrizione (opzionale)</label>
                    </div>

                    <div class="mb-3 form-floating nr_pages_width">
                        <input type="number" name="page_count" class="form-control" id="pages" placeholder="10" value="{{ old('page_count', $book->page_count) }}" min="1">
                        <label for="pages">N° Pagine (opzionale)</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <select name="author_id" class="form-select" aria-label="Default select example" id="author" required>
                            <option value="">Seleziona l'Autore</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <label for="author">Autore</label>
                    </div>

                    <div class="mb-4 form-floating">
                        <select name="category_id" class="form-select" aria-label="Default select example" id="category" required>
                            <option value="">Seleziona la Categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="category">Categoria</label>
                    </div>

                    <div class="mb-3 form-floating">
                        <input type="file" name="image" class="form-control" id="cover" placeholder="Copertina Libro">
                        <label for="cover">Copertina del Libro (opzionale)</label>
                    </div>

                    <div class="pt-4 border-top">
                        <button type="submit" class="btn btn-primary me-3">Aggiorna il Libro</button>
                        <a href="{{ route('books.index') }}" class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

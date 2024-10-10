@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Autore</h1>

        <form action="{{ route('authors.update', $author->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $author->name) }}" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthdate" class="form-label">Data di Nascita</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $author->birthdate ? $author->birthdate : '') }}">

                @error('birthdate')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna Autore</button>
            <a href="{{ route('authors.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection

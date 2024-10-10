@extends('layouts.app')

@section('content')
    <article class="detail-book row py-3 px-1 rounded-4">
        <div class="col-md-4">
            <figure>
                <img src="{{ asset($book->image ?? 'img/no-cover.webp') }}" class="rounded" alt="{{ $book->title }}">
            </figure>
        </div>
        <div class="col-md-8">
            <h2 class="mb-3">{{ $book->title }}</h2>
            <div>
                <p>{{ $book->description }}</p> <!-- Assicurati che la colonna 'description' esista nel tuo database -->
            </div>
            <div class="border-top mt-2 pt-3">
                <span class="badge text-bg-secondary">{{ $book->author->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->category->name }}</span>
                <span class="badge text-bg-secondary">{{ $book->page_count }} pagine</span> <!-- Assicurati che la colonna 'page_count' esista -->
            </div>
        </div>
    </article>
@endsection

@extends('layouts.app')

@section('content')
    <main class="container">
        <section class="row">
            <a href="{{ route('categories.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi una Categoria</a>
            <div class="col-md-12 my-4">

                <h2 class="mt-5 mb-4">Le Categorie</h2>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="w-auto">#</th>
                        <th scope="col" class="w-75">Categoria</th>
                        <th scope="col" class="w-auto text-end">Azioni</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $category->name }}</td>
                            <td class="text-end">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Sei sicuro? Stai eliminando una Categoria')" class="btn btn-secondary"><i class="bi bi-trash3"></i></button>
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

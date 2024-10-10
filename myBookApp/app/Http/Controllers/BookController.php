<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author', 'category')->get();
        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.create', compact('authors', 'categories'));
    }

    public function store(StoreBookRequest $request) // Usa StoreBookRequest
    {
        $bookData = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/books/';
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path($imagePath), $imageName);

            $bookData['image'] = $imagePath . $imageName;
        }

        Book::create($bookData);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('books.edit', compact('book', 'authors', 'categories'));
    }

    public function update(UpdateBookRequest $request, Book $book) // Usa UpdateBookRequest
    {
        $bookData = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/books/';
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Salva l'immagine senza ridimensionarla
            $image->move(public_path($imagePath), $imageName);

            // Rimuovi l'immagine precedente se esiste
            if ($book->image) {
                unlink(public_path($book->image));
            }

            $bookData['image'] = $imagePath . $imageName;
        }

        $book->update($bookData);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        // Rimuovi l'immagine se esiste
        if ($book->image) {
            unlink(public_path($book->image));
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}

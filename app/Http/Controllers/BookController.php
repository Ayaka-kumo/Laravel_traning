<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(): View
    {
        $books = Book::query()
            ->latest('date')
            ->latest('id')
            ->get();

        return view('books.index', [
            'books' => $books,
        ]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'summary' => ['nullable', 'string'],
            'memo' => ['nullable', 'string'],
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('status', '読書メモを登録しました。');
    }
}

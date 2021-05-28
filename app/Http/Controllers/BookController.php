<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;
    protected $authorService;
    protected $categoryService;

    public function __construct(
        BookService $bookService,
        AuthorService $authorService,
        CategoryService $categoryService
    )
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $authors = $this->authorService->getAll();
        $books = $this->bookService->getAll();
        return view('admin.book.list', compact('books','authors'));
    }

    public function create()
    {
        $authors = $this->authorService->getAll();
        $categories = $this->categoryService->getAll();
        return view('admin.book.add',compact('authors','categories'));
    }

    public function edit($id)
    {
        $authors = $this->authorService->getAll();
        $categories = $this->categoryService->getAll();
        $book = $this->bookService->getById($id);
        return view('admin.book.edit', compact('book','authors','categories'));
    }

    public function store(Request $request)
    {

        $this->bookService->store($request);
        return redirect()->route('books.list');
    }

    public function update($id, Request $request)
    {
        $book = $this->bookService->getById($id);
        $this->bookService->update($request);
        return redirect()->route('books.list');
    }

    public function delete($id)
    {
        $this->bookService->delete($id);
        return redirect()->route('books.list');
    }


}

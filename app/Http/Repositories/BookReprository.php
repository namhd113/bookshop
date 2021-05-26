<?php

namespace App\Http\Repositories;


use App\Models\Book;

class BookReprository
{
    public function getAll()
    {
        return Book::all();
    }

    public function getById($id)
    {
        return Book::findOrFail($id);
    }

    public function store($book)
    {
        $book->save();
    }

    public function delete($book)
    {
        $book->delete();
    }
}

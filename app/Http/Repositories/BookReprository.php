<?php

namespace App\Http\Repositories;


use App\Models\Book;
use Illuminate\Support\Facades\DB;

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
    public function getByName($name){
        return DB::table('books')->where('name','like','%'.$name.'%')->get();
    }
}

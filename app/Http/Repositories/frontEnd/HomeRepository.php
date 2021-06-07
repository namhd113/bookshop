<?php


namespace App\Http\Repositories\frontEnd;


use App\Models\Book;
use Illuminate\Support\Facades\DB;

class HomeRepository
{
    function getAll()
    {
        return Book::paginate(6);
    }

    function newBooks()
    {
        return Book::orderBy('id', 'DESC')->paginate(6);
    }

    function booksOrderByName()
    {
        return Book::orderBy('name')->paginate(6);
    }

    function findById($id)
    {
        return Book::findOrFail($id);
    }


}

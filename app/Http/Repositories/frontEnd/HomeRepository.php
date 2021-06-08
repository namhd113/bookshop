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
    function searchBooks($search): \Illuminate\Support\Collection
    {
        return DB::table('Book')
            ->where('name', 'LIKE', "%$search%")
            ->orWhere('author_name', 'LIKE', "%$search%")
            ->orWhere('category_name', 'LIKE', "%$search%")
            ->select('id','name', 'image', 'price')
            ->groupBy('id')
            ->get();
    }


}

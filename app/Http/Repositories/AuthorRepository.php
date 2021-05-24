<?php


namespace App\Http\Repositories;


use App\Models\Author;

class AuthorRepository
{
    public function getById($id)
    {
        return Author::find($id);
    }

    public function getAll()
    {
        return Author::all();
    }

    public function store($author)
    {
        $author->save();
    }
}

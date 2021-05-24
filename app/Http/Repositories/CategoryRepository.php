<?php
namespace App\Http\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getById($id)
    {
        return Category::find($id);
    }

    public function getAll()
    {
        return Category::all();
    }

    public function store($category)
    {
        $category->save();
    }

}
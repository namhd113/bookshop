<?php
namespace App\Http\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

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
    public function getByName($name){
        return DB::table('categories')->where('name','like','%'.$name.'%')->get();
    }


}
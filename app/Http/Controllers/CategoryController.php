<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }

    public function index()
    {

        $category = $this->categoryService->getAll();
        return view('admin.category.list',compact('category'));
    }
    public function create()
    {

        return view('admin.category.add');
    }

    public function store(CategoryRequest $request)
    {

        $this->categoryService->store($request);
        return redirect()->route('category.list');
    }
    public function edit($id){

        $category = $this->categoryService->getById($id);
        return view('admin.category.edit',compact("category"));
    }
    function update($id, Request $request)
    {
        $category = $this->categoryService->getById($id);
        $this->categoryService->update($category, $request);
        return redirect()->route('category.list');
    }
    public function destroy($id){
        $category = $this->categoryService->getById($id);
        $category->delete($category);
        return redirect()->route('category.list');
    }
    public function search(Request $request)
    {
        //dd('ss');
        $name = $request->name;
        $category = $this->categoryService->search($name);

        return response()->json(['data'=>$category]);
    }

}

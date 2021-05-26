<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthorRequest;
use App\Http\Services\AuthorService;

use Illuminate\Http\Request;



class AuthorController extends Controller
{
    protected $authorService;
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        $author = $this->authorService->getAll();
        return view('admin.author.list',compact('author'));
    }
    public function create()
    {
        return view('admin.author.add');
    }
    public function edit($id)
    {
        $author = $this->authorService->getById($id);
        return view('admin.author.edit',compact('author'));
    }

    public function store(CreateAuthorRequest $request)
    {
        $this->authorService->store($request);
        return redirect()->route('author.list');

    }

    function update($id, CreateAuthorRequest $request)
    {
        $author = $this->authorService->getById($id);
        $this->authorService->update($author, $request);
        return redirect()->route('author.list');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $deleted = $this->authorService->getById($id);
        $this->authorService->delete($id);
        return redirect()->route('author.list');

    }
}

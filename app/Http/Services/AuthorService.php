<?php


namespace App\Http\Services;


use App\Http\Repositories\AuthorRepository;
use App\Models\Author;

class AuthorService extends BaseService
{
    protected $authorRepo;
    public function __construct(AuthorRepository $authorRepo)
    {
        $this->authorRepo = $authorRepo;
    }

    public function getAll(){
        return $this->authorRepo->getAll();
    }
    public function getById($id){
        return $this->authorRepo->getById($id);
    }
    public function store($request)
    {
        $author = new Author();
        $author->fill($request->all());
        $path = $this->updateLoadFile($request, 'avatar', 'author-images');
        $author->avatar = $path;
        $this->authorRepo->store($author);
    }

    function update($author, $request)
    {
        $author->fill($request->all());
        $path = $this->updateLoadFile($request, 'avatar', 'author-images');
        $author->avatar = $path;
        $this->authorRepo->store($author);
    }
    public function delete($id){
        $author = $this->authorRepo->getById($id);
        $this->authorRepo->delete($author);
    }
    public function search($name){
        return $this->authorRepo->getByName($name);
    }
}

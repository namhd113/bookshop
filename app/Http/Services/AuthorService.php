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

    public function getById($id)
    {
        return $this->authorRepo->getById($id);
    }

    public function getAll()
    {
        return $this->authorRepo->getAll();
    }

    function store($request)
    {
        $author = new Author();
        $author->fill($request->all());
        $path = $this->updateLoadFile($request, 'author_image', 'author-images');
        $author->author_image = $path;
        $this->authorRepo->store($author);

    }

    function update($request, $author)
    {
        $author->fill($request->all());
        $path = $this->updateLoadFile($request, 'author_image', 'author-images');
        $author->author_image = $path;
        $this->authorRepo->store($author);
    }

    public function delete($author)
    {
        $this->authorRepo->delete($author);
    }

//    function search($request)
//    {
//        $search = $request->search_author;
//        return $this->authorRepo->search($search);
//    }
}

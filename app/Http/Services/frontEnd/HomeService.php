<?php


namespace App\Http\Services\frontEnd;


use App\Http\Repositories\frontEnd\HomeRepository;

class HomeService
{
    protected $homeRepo;
    public function __construct(HomeRepository $homeRepository)
    {
        $this->homeRepo = $homeRepository;
    }

    function getAll()
    {
        return $this->homeRepo->getAll();
    }

    function newBooks()
    {
        return $this->homeRepo->newBooks();
    }

    function booksOrderByName()
    {
        return $this->homeRepo->booksOrderByName();
    }

    function findById($id)
    {
        return $this->homeRepo->findById($id);
    }

    function searchBooks($request)
    {
        return $this->homeRepo->searchBooks($request->search_book);
    }

    function getBooksOfCategory($id)
    {
        return $this->homeRepo->getBookOfCategory($id);
    }


}

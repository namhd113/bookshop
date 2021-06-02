<?php
namespace App\Http\Services;
use App\Http\Repositories\CategoryRepository;
use App\Models\Category;

class CategoryService extends BaseService
{
    protected $CategoryRepo;

    public function __construct(CategoryRepository $CategoryRepo)
    {
        $this->CategoryRepo = $CategoryRepo;
    }

    public function getById($id)
    {
        return $this->CategoryRepo->getById($id);
    }

    public function getAll()
    {
        return $this->CategoryRepo->getAll();
    }


    public function store($request)
    {
        $category = new Category();
        $category->fill($request->all());
        $this->CategoryRepo->store($category);
    }

    function update($category, $request)
    {
        $category->fill($request->all());
        $this->CategoryRepo->store($category);
    }

    public function delete($category)
    {
        $this->CategoryRepo->delete($category);
    }
    public function search($name){
        $output = '';
        return $this->CategoryRepo->getByName($name);

    }
}

<?php


namespace App\Http\Services;


use App\Http\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    protected $customerRepo;
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepo = $customerRepository;
    }

    function getAll()
    {
        return $this->customerRepo->getAll();
    }

    function findById($id)
    {
        return $this->customerRepo->findById($id);
    }

    function store($request)
    {
        $customer = $this->customerRepo->getInstance();
        $customer->fill($request->all());
        $customer->password = Hash::make($request->password);
        $this->customerRepo->store($customer);
    }
}

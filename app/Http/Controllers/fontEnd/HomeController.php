<?php

namespace App\Http\Controllers\fontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Services\CustomerService;
use App\Http\Services\frontEnd\HomeService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $homeService;
    protected $customerService;

    public function __construct(HomeService $homeService, CustomerService $customerService)
    {
        $this->homeService = $homeService;
        $this->customerService = $customerService;
    }

    function index()
    {
        $books = $this->homeService->newBooks();
        $booksOrderByName = $this->homeService->booksOrderByName();
        return view('frontEnd.master', compact('books', 'booksOrderByName'));
    }

    function loginCustomer()
    {
        return view('frontEnd.login');
    }

    function checkLogin(Request $request)
    {
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful...
            return redirect()->route('home.view-all')->with('message', 'Login successfully');
        } else {

            Session::flash('error', 'Email or password not correct');
            return redirect()->route('home.login')->with('error', 'Email or password not correct');
        }
    }

    function logout()
    {
        if (Auth::guard('customer')->user()) {
            Auth::guard('customer')->logout();
            return redirect()->route('home.login');
        } else {
            return redirect()->route('home.login');
        }
    }

    function showFormRegister()
    {
        return view('frontEnd.register');
    }

    function register(Request $request)
    {
        $this->customerService->store($request);
        return redirect()->route('home.index')->with('message', 'Register successfully');
    }
    function bookDetail($id)
    {
        $book = $this->homeService->findById($id);
        return view('frontEnd.books.book-detail', compact('book'));
    }

    function viewAll()
    {
        $books = $this->homeService->getAll();
        return view('frontEnd.books.view-all', compact('books'));
    }
}

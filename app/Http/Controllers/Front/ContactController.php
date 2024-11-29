<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $productCategoryService;
    private $contactService;

    public function __construct(ProductCategoryServiceInterface $productCategoryService, ContactRepositoryInterface $contactService)
    {
        $this->productCategoryService = $productCategoryService;
        $this->contactService = $contactService;
    }

    public function index()
    {
        $categories = $this->productCategoryService->all();

        return view('front.contact.index', compact('categories'));
    }

    public function postContact(Request $request)
    {
        $this->contactService->create($request->all());

        return redirect()->back();
    }
}

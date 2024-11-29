<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\Product\ProductServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $productService;
    private $blogService;
    private $productCategoryService;

    public function __construct(ProductServiceInterface $productService,
                                BlogServiceInterface $blogService,
                                ProductCategoryServiceInterface $productCategoryService)
    {
        $this->productService = $productService;
        $this->blogService = $blogService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        $categories = $this->productCategoryService->all();
        $featuredProducts = $this->productService->getFeaturedProducts();
        $blogs = $this->blogService->getLatesBlogs();

        return view('front.index', compact('featuredProducts', 'blogs', 'categories'));
    }
}

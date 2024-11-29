<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Blog\BlogServiceInterface;
use App\Services\BlogComment\BlogCommentServiceInterface;
use App\Services\ProductCategory\ProductCategoryServiceInterface;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;
    private $productCategoryService;
    private $blogCommentService;

    public function __construct(BlogServiceInterface $blogService,
                                ProductCategoryServiceInterface $productCategoryService,
                                BlogCommentServiceInterface $blogCommentService)
    {
        $this->blogService = $blogService;
        $this->productCategoryService = $productCategoryService;
        $this->blogCommentService = $blogCommentService;
    }

    public function index(Request $request)
    {
        $blogs = $this->blogService->searchAndPaginateBlog('title', $request->get('searchb'));
//        $blogs = $this->blogService->all();
        $categories = $this->productCategoryService->all();

        return view('front.blog.index', compact('blogs', 'categories'));
    }

    public function show($id)
    {
        $blog = $this->blogService->find($id);
        $blogs = $this->blogService->all();

        $categories = $this->productCategoryService->all();

        return view('front.blog.show', compact('blog', 'categories', 'blogs'));
    }

    public function commentBlog(Request $request)
    {
        $this->blogCommentService->create($request->all());

        return redirect()->back();
    }
}

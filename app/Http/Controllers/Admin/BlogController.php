<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\Blog\BlogServiceInterface;
use App\Utilities\Common;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blogs = $this->blogService->searchAndPaginate('title', $request->get('search'));
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->except('image_old');
        //Xử lý file:
        if ($request->hasFile('image')) {
            $data['image'] = Common::uploadFile($request->file('image'), 'front/img/blog');
        }

        $blog = $this->blogService->create($data);


        return redirect('admin/blog/'.$blog->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->except('image_old');

        //Xử lý file ảnh
        if ($request->hasFile('image')) {
            //Thêm file mới
            $data['image'] = Common::uploadFile($request->file('image'), 'front/img/blog');

//            //Xóa file cũ:
//            $file_name_old = $request->get('image_old');
//            if ($file_name_old != '') {
//                unlink('front/img/blog/' . $file_name_old);
//            }
        }

        //Cập nhật dữ liệu
        $this->blogService->update($data, $blog->id);

        return redirect('admin/blog/' . $blog->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->blogService->delete($blog->id);

        //Xóa file
        $file_name = $blog->image;
        if ($file_name != '') {
            unlink('front/img/blog/' . $file_name);
        }

        return redirect('admin/blog');
    }
}

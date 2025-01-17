
@extends('admin.layout.master')

@section('title', 'Blog')

@section('body')

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Blog
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="./admin/blog/create" class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">

                        <form>
                            <div class="input-group">
                                <input type="search" name="search" id="search" value="{{ request('search') }}"
                                    placeholder="Search everything" class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>&nbsp;
                                        Search
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th style="width: 300px">Blog</th>
                                    <th class="text-center">Subtitle</th>
                                    <th class="text-center">Content</th>
                                    <th class="text-center">Category</th>
                                    <th style="width: 140px" class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($blogs as $blog)
                                <tr>
                                    <td class="text-center text-muted">#{{ $blog->id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 70px; width: 60px; object-fit: contain;"
                                                            data-toggle="tooltip" title="image"
                                                            data-placement="bottom"
                                                            src="./front/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $blog->title }}</div>
                                                    <div class="widget-subheading opacity-7">
                                                        {{ $blog->writer }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center" ><p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{!! $blog->subtitle !!}</p></td>
                                    <td class="text-center" ><p style="display: block; display: -webkit-box; height: 16px*1.3*3; -webkit-line-clamp: 3;  /* số dòng hiển thị */
                                -webkit-box-orient: vertical; overflow: hidden;text-overflow: ellipsis;">{{ $blog->content }}</p></td>
                                    <td class="text-center">{{ $blog->category }}</td>
                                    <td class="text-center">
                                        <a href="./admin/blog/{{ $blog->id }}"
                                            class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                            Details
                                        </a>
                                        <a href="./admin/blog/{{ $blog->id }}/edit" data-toggle="tooltip" title="Edit"
                                            data-placement="bottom" class="btn btn-outline-warning border-0 btn-sm">
                                            <span class="btn-icon-wrapper opacity-8">
                                                <i class="fa fa-edit fa-w-20"></i>
                                            </span>
                                        </a>
                                        <form class="d-inline" action="./admin/blog/{{ $blog->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                type="submit" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                onclick="return confirm('Bạn có chắc chắn xóa blog này không?')">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-trash fa-w-20"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        {{ $blogs->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection

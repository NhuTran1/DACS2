
@extends('front.layout.master')

@section('title', 'Blog')

@section('body')

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="./"><i class="fa fa-home"> Home</i></a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="">Style</a></li>
                                <li><a href="">Model</a></li>
                                <li><a href="">Hot</a></li>
                                <li><a href="">Travel</a></li>
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">

                                @foreach($blogs as $blog)
                                    <a href="blog/{{ $blog->id }}" class="rb-item">
                                        <div class="rb-pic">
                                            <img style="object-fit: cover" src="./front/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}" alt="">
                                        </div>
                                        <div class="rb-text">
                                            <h6>{{ $blog->title }}</h6>
                                            <p>{{ $blog->category }} -<span> {{ date('M d, Y', strtotime($blog->create_at)) }}</span></p>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trouser</a>
                                <a href="#">Men's hat</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">

                        @foreach($blogs as $blog)
                            <div class="col-lg-6 col-sm-6">
                                <div class="blog-item">
                                    <div class="bi-pic">
                                        <img style="height: 279px; width: 409px; object-fit: cover" src="./front/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}" alt="">
                                    </div>
                                    <div class="bi-text">
                                        <a href="blog/{{ $blog->id }}">
                                            <h4>{{ $blog->title }}</h4>
                                        </a>
                                        <p>{{ $blog->category }} <span>- {{ date('M d, Y', strtotime($blog->create_at)) }}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <div class="d-block card-footer">
                                {{ $blogs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection

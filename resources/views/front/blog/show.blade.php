
@extends('front.layout.master')

@section('title', 'Blog Detail')

@section('body')

    <!-- Blog Details Section Begin -->
    <div class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2>{{ $blog->title }}</h2>
                            <p>{{ $blog->writer }} <span>- {{ date('M d, Y', strtotime($blog->create_at)) }}</span></p>
                        </div>
                        <div class="blog-large-pic">
                            <img style="height: 550px; width: 1030px; object-fit: cover"
                                 src="front/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}" alt="">
                        </div>
                        <div class="blog-detail-desc">
                            <p>
                                {{ $blog->subtitle }}
                            </p>
                        </div>
                        <div class="blog-quote">
                            <p>" {!! $blog->content !!} " <span>- {{ $blog->writer }}</span></p>
                        </div>
{{--                        <div class="blog-more">--}}
{{--                            <div class="row">--}}

{{--                                <div class="col-sm-4">--}}
{{--                                    <img src="front/img/blog/blog-detail-1.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <img src="front/img/blog/blog-detail-2.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4">--}}
{{--                                    <img src="front/img/blog/blog-detail-3.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
                                    <li>{{ $blog->category }}</li>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>

                        @foreach($blog->blogComments as $blogComment)
                            <div class="posted-by">
                                <div class="pb-pic">
                                    <img style="height: 65px; " class="rounded-circle" src="front/img/user/{{ $blogComment->user->avatar ?? 'default-avatar.jpg'}}" alt="">
                                </div>
                                <div class="pb-text">
                                    <h5><b>{{ $blogComment->name }}</b>  <span>{{ $blogComment->created_at }}</span></h5>
                                    <p>
                                        {{ $blogComment->messages }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form action="" method="post" class="comment-form">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <input type="hidden" name="user_id" value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null }}">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Email" name="email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages" rows="" cols="" name="messages"></textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="blog-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Related Post</h2>
                                    </div>
                                </div>

                                @foreach($blogs as $blog)
                                    <div class="col-lg-6 col-md-6">
                                        <a href="blog/{{ $blog->id }}" class="prev-blog">
                                            <div class="pb-pic">
                                                <img class="rounded-circle" style="width: 145px; height: 100px; object-fit: contain" src="front/img/blog/{{ $blog->image ?? 'default-blog.jpg' }}" alt="">
                                            </div>
                                            <div class="pb-text">
                                                <h5>{{ $blog->title }}</h5>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->

@endsection

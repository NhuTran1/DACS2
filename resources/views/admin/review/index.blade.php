
@extends('admin.layout.master')

@section('title', 'Review')

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
                        Review
                        <div class="page-title-subheading">
                            View, delete and manage.
                        </div>
                    </div>
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
                                    <th>Product</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Content</th>
                                    <th class="text-center">Rating</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            @foreach($reviews as $review)
                                <tr>
                                    <td class="text-center text-muted">#{{ $review->id }}</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img style="height: 60px;width: 60px;object-fit: cover;"
                                                             data-toggle="tooltip" title="product"
                                                             data-placement="bottom"
                                                             src="./front/img/products/{{ $review->product->productImages[0]->path ?? '' }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">{{ $review->created_at }}</div>{{ $review->product->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $review->name}} </td>
                                    <td class="text-center">{{ $review->messages }}</td>
                                    <td class="text-center">{{ $review->rating }} <i class="fa fa-star" style="color: #ff9705"></i></td>

                                    <td class="text-center">
                                        <form class="d-inline" action="./admin/review/{{ $review->id }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                type="submit" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                onclick="return confirm('Bạn có chắc chắn xóa review này không?')">
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
                        {{ $reviews->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection

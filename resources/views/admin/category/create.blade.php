
@extends('admin.layout.master')

@section('title', 'Category')

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
                        Category
                        <!-- Breadcrumb Section Begin -->
                        <div class="page-title-subheading">
                            <div class="page-header">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./admin">Home</a></li>
                                        <li class="breadcrumb-item"><a href="./admin/category">Category</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- Breadcrumb Section End -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form method="post" action="admin/category" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="name" id="name" placeholder="Name" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <a href="./admin/category" class="border-0 btn btn-outline-danger mr-1">
                                        <span class="btn-icon-wrapper pr-1 opacity-8">
                                            <i class="fa fa-times fa-w-20"></i>
                                        </span>
                                        <span>Cancel</span>
                                    </a>

                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main -->

@endsection

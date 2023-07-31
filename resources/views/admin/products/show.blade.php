@extends('layouts.admin.app')

@section('content')
    {{-- <div class="content-wrapper"> --}}
    <div class="page-header">
        <h3 class="page-title"> {{ $product->title }} - Product Details </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="pb-4 text-center border-bottom">
                                <img src="/products/{{ $product->image }}" alt="profile" class="mb-3 img-fluid">
                                {{-- {{ $product->description }} --}}

                            </div>
                            <div class="py-4 border-bottom">
                                <p>Product Category</p>
                                <div>
                                    <label class="badge badge-outline-light">{{ $product->category->name }}</label>

                                    <br>
                                    <label class="text-small">{{ $product->category->description }}</label>

                                </div>
                            </div>


                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3>{{ $product->title }}</h3>
                                    <div class="d-flex align-items-center">
                                        <div>
                                           Tags: <label class="badge badge-outline-light">{{ $product->category->name }}</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="profile-feed">

                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="ms-4">
                                        <p> {{ $product->description }}
                                        </p>
                                        <img src="/admin/images/samples/1280x768/12.jpg" alt="sample"
                                            class="rounded mw-100">
                                        {{-- <p class="mt-2 mb-0 small text-muted">
                                            <span>
                                                <i class="mdi mdi-star me-1"></i>4 </span>
                                            <span class="ms-2">
                                                <i class="mdi mdi-comment me-1"></i>11 </span>
                                            <span class="ms-2">
                                                <i class="mdi mdi-reply"></i>
                                            </span>
                                        </p> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>
@endsection

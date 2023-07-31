@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        @if (session()->has('message'))
            <div class="alert alert-success myAlert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            </div>
        @endif
        <h3 class="page-title"> Products </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Available Products</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Cuantity</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td> {{ $product->title }} </td>
                                        {{-- <td>{{ $product->description }}</td> --}}
                                        <td> <img src="/products/{{ $product->image }}" alt=""></td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discount_price }}</td>

                                        <td>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-light">
                                                <i class="mdi mdi-eye text-primary"></i>
                                            </a>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-success">
                                                <i class="mdi mdi-grease-pencil text-light"></i>
                                            </a>
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-danger">
                                                <i class="mdi mdi-close text-light"></i>
                                            </a>

                                        </td>
                                        {{-- <td><label class="badge badge-danger">Pending</label></td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

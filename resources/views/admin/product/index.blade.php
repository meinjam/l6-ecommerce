@extends('layouts.admin.admin')
@section('open-product') menu-open @endsection
@section('active-product') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">All Products</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus-circle"></i> Add New Product
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <form action="" method="get">
                                <div class="input-group mb-3 input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search color">
                                    <div class="input-group-append">
                                      <button class="btn btn-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID.</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th width="13%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" height="70" alt="{{ $product->name }}">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>${{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->slug) }}"
                                        class="btn btn-secondary btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit', $product->slug) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('delete.product', $product->slug) }}"
                                        class="btn btn-danger btn-sm" id="delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <div class="float-right">
                        {{ $products->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
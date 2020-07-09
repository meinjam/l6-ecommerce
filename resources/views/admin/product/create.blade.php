@extends('layouts.admin.admin')
@section('open-product') menu-open @endsection
@section('active-product') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6 form-group">
                                <label for="name">Enter Product Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="col-md-6 form-group">
                                <label for="price">Enter Product Price</label>
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror" id="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="col-md-6 form-group">
                                <label for="category">Select Category</label>
                                <select name="category_id" id="category"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Brand --}}
                            <div class="col-md-6 form-group">
                                <label for="brand">Select Brand</label>
                                <select name="brand_id" id="brand"
                                    class="form-control @error('brand_id') is-invalid @enderror">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Color --}}
                            <div class="col-md-6 form-group">
                                <label for="color">Select Colors</label>
                                <select name="color_id[]" id="color"
                                    class="form-control select2 @error('color_id') is-invalid @enderror" multiple>
                                    @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                                @error('color_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Size --}}
                            <div class="col-md-6 form-group">
                                <label for="size">Select Sizes</label>
                                <select name="size_id[]" id="size"
                                    class="form-control select2 @error('size_id') is-invalid @enderror" multiple>
                                    @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>
                                @error('size_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Main Image --}}
                            <div class="col-md-6 form-group">
                                <label for="image">Select Main Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image"
                                        class="custom-file-input @error('image') is-invalid @enderror" id="image">
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Sub Image --}}
                            <div class="col-md-6 form-group">
                                <label for="sub_image">Select Sub Images</label>
                                <div class="custom-file">
                                    <input type="file" name="sub_image[]"
                                        class="custom-file-input @error('sub_image') is-invalid @enderror" id="sub_image" multiple>
                                    <label class="custom-file-label" for="image">Choose file...</label>
                                </div>
                                @error('sub_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Short Description --}}
                            <div class="col-md-12 form-group">
                                <label for="short_desc">Enter Short Description:</label>
                                <textarea name="short_desc" id="short_desc" rows="2"
                                    class="form-control @error('short_desc') is-invalid @enderror">{{ old('short_desc') }}</textarea>
                                @error('short_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- Long Description --}}
                            <div class="col-md-12 form-group">
                                <label for="long_desc">Enter Long Description:</label>
                                <textarea name="long_desc" id="long_desc" rows="4"
                                    class="form-control @error('long_desc') is-invalid @enderror">{{ old('long_desc') }}</textarea>
                                @error('long_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                        {{-- Submit --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('products.index') }}" class="btn btn-info">Back to Products</a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
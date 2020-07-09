@extends('layouts.admin.admin')
@section('open-product') menu-open @endsection
@section('active-product') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Show Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                    <li class="breadcrumb-item active">Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">

            <a href="{{ route('products.index') }}" class="btn btn-success btn-sm ml-2 mb-2">Back to All Products</a>
            <a href="{{ route('products.edit', $product->slug) }}"class="btn btn-primary btn-sm mb-2">
                <i class="fa fa-edit"></i> Edit
            </a>
            <a href="{{ route('delete.product', $product->slug) }}"class="btn btn-danger btn-sm mb-2" id="delete">
                <i class="fa fa-trash"></i> Delete
            </a>
            
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
                    <div class="col-12">
                        <img src="{{ asset($product->image) }}" class="product-image" alt="{{ $product->name }}">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></div>
                        @foreach ($product->sub_images as $image)
                            <div class="product-image-thumb"><img src="{{ asset($image->image) }}" alt="Product Image"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $product->name }}</h3>
                    <p>{{ $product->short_desc }}</p>

                    <hr>
                    <h4>Available Colors</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($product->colors as $color)
                            <label class="btn btn-default text-center active">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                                {{ ucwords($color->name) }}
                                <br>
                                <i class="fas fa-circle fa-2x" style="color: {{ strtolower($color->name) }}"></i>
                            </label>
                        @endforeach
                    </div>

                    <h4 class="mt-3">Available Sizes</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($product->sizes as $size)
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                                <span class="text-xl">{{ strtoupper($size->name) }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Category: {{ strtoupper($product->category->name) }}
                        </h2>
                    </div>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Brand: {{ strtoupper($product->brand->name) }}
                        </h2>
                    </div>
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Price: ${{ $product->price }}
                        </h2>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                            role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                            role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> {{ $product->long_desc }}
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                        commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis
                        elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
                        eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod
                        lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget,
                        ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui.
                        Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                        elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque.
                        Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                        neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh
                        rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                        Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit,
                        at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
                        lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
                        Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->

@endsection
@extends('layouts.frontend.layout')

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url( {{ asset('frontend/images/bg-03.jpg') }} );">
    <h2 class="ltext-105 cl0 txt-center">
        {{ $category->name }} Category Products
    </h2>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" href="{{ route('products') }}">
                    All Products{{ $category->id }}
                </a>
                @foreach ($categories as $category)
                    <a class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" 
                        href="{{ route('category', $category->category->slug) }}"
                        >
                        {{ $category->category->name }} {{  $category->category->id }}
                    </a>
                @endforeach
            </div>
            
        </div>

        <div class="row isotope-grid">
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset( $product->image ) }}" alt="IMG-PRODUCT">

                            <a href="{{ route('product.details', $product->slug) }}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Add To Cart
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>

                                <span class="stext-105 cl3">
                                    {{ $product->price }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="{{ route('products') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More Products
            </a>
        </div>
    </div>
</section>
    
@endsection
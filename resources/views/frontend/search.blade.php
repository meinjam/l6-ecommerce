@extends('layouts.frontend.layout')

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{ asset('frontend/images/bg-02.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        Search Result
    </h2>
</section>

<section class="bg0 p-t-23 p-b-85">
    <div class="container">
        <div class="row isotope-grid">

            @if (count($products) > 0)

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
                                    <a href="{{ route('product.details', $product->slug) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
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
                
            @else
                <h2 class="ltext-105 txt-center mx-auto">
                    Sorry, No Result Found!!!
                </h2>
            @endif

        </div>
    </div>
</section>

@endsection
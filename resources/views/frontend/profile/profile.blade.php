@extends('layouts.frontend.layout')
@section('account') active-menu @endsection

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url({{ asset('frontend/images/bg-01.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        User Dashboard
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-75">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card p-4">
                    <p class="text-center">
                        <img src="{{ asset('img/avatar.png') }}" class="img-sluid rounded-circle pb-2" width="200" height="200">
                    </p>
                    <h2 class="text-center mb-2">{{ $profile->name }}</h2>
                    <p class="text-center mb-1">Email: {{ $profile->email }}</p>
                    <p class="text-center mb-1">Phone: {{ $profile->mobile }}</p>
                    <p class="text-center mb-1">Gender: {{ $profile->gender }}</p>
                    <p class="text-center mb-1">Address: {{ $profile->address }}</p>
                    <p class="text-center"><a href="" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">See Orders</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
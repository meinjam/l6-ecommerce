@extends('layouts.frontend.layout')
@section('shop') active-menu @endsection

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url( {{ asset('frontend/images/bg-03.jpg') }} );">
    <h2 class="ltext-105 cl0 txt-center">
        Shipping Information
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-75">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('checkout.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="tag">Enter Full Name</label>
                        <div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Enter Mobile Number</label>
                        <div>
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror"
                                name="mobile" value="{{ old('mobile') }}" autocomplete="mobile" autofocus>
                            <small class="text-muted">e.g. 01911111111</small>    
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Enter Address</label>
                        <div>
                            <textarea name="address" id="address"rows="4" class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
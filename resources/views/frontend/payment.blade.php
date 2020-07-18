@extends('layouts.frontend.layout')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url( {{ asset('frontend/images/bg-03.jpg') }} );">
    <h2 class="ltext-105 cl0 txt-center">
        Payment Information
    </h2>
</section>

<div class="bg0 p-t-75">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">Product</th>
                            <th class="column-2"></th>
                            <th class="column-3">Price</th>
                            <th class="column-2">Color</th>
                            <th class="column-2">Size</th>
                            <th class="column-4">Quantity</th>
                            <th class="column-5">Total</th>
                            <th class="column-1">Delete</th>
                        </tr>

                        @foreach ($carts as $cart)
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="{{ asset($cart->options->image) }}" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2">{{ $cart->name }}</td>
                            <td class="column-3">$ {{ $cart->price }}</td>
                            <td class="column-3">{{ $cart->options->color_name }}</td>
                            <td class="column-3">{{ $cart->options->size_name }}</td>
                            <td class="column-4">
                                <form action="{{ route('update.cart') }}" method="post">
                                    @csrf
                                    <div>
                                        <input class="mtext-104 cl3 txt-center num-product form-control sss"
                                            type="number" name="qty" value="{{ $cart->qty }}">
                                        <input type="hidden" name="rowId" value="{{ $cart->rowId }}">
                                        <input type="submit" value="Update"
                                            class="flex-c-m stest-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                    </div>
                                </form>
                            </td>
                            <td class="column-5">{{ $cart->subtotal }}</td>
                            <td class="column-5">
                                <a href="{{ route('delete.cart', $cart->rowId) }}"
                                    class="cart_quantity_delete btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="p-4 column-5">Grand Total</td>
                            <td class="p-4 column-5">${{ $total }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="p-b-75">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="size-204 respon6-next">
                    <form action="{{ route('payment.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="total_price" value="{{ $total }}">
                        <div class="rs1-select2 bor8 bg0">
                            <select class="js-select2" name="payment_method" id="payment_method">
                                <option value="">Select Payment Method</option>
                                <option value="Cash On Delivery">Cash On Delivery</option>
                                <option value="bKash">bKash</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                        @if ($errors->has('payment_method'))
                        <p style="color: #e72d00">{{ $errors->first('payment_method') }} </p>
                        @endif

                        <div class="show_field my-3">
                            <small class="text-muted">if payment method bkash, please type trans no</small>
                            <br>
                            <span>bKash No is: 01685 970744</span>
                            <input type="text" name="transaction_number" class="form-control"
                                placeholder="enter your transection number">
                        </div>
                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                            Submit
                        </button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection
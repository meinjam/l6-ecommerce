@extends('layouts.frontend.layout')
@section('shop') active-menu @endsection

@section('content')
<style>
    .sss {
        float: left;
    }
    .s888 {
        height: 40px;
        border: 1px solid #e6e6e6;
    }
</style>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url( {{ asset('frontend/images/bg-03.jpg') }} );">
    <h2 class="ltext-105 cl0 txt-center">
        Shopping Cart
    </h2>
</section>
    
<!-- Shoping Cart -->
<div class="bg0 p-t-75 p-b-85">
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
                                            <input class="mtext-104 cl3 txt-center num-product form-control sss" type="number" name="qty" value="{{ $cart->qty }}">
                                            <input type="hidden" name="rowId" value="{{ $cart->rowId }}">
                                            <input type="submit" value="Update" class="flex-c-m stest-101 cl2 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                        </div>
                                    </form>
                                </td>
                                <td class="column-5">{{ $cart->subtotal }}</td>
                                <td class="column-5">
                                    <a href="{{ route('delete.cart', $cart->rowId) }}" class="cart_quantity_delete btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="wrap-table-shopping-cart">
                    <table class="table-shopping-cart">
                        <tr class="table_head">
                            <th class="column-1">
                                <h5>What would you like to do next?</h5>
                                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                            </th>
                        </tr>
                        <tr class="table_row">
                            <td class="column-1">
                                <div class="total_area">
                                    <ul>
                                    <li>Cart Total: <span style="font-weight: bolder">${{ $total }}</span></li>
                                    <li>Eco Tax: <span style="font-weight: bolder">$0.00</span></li>
                                    <li>Shipping Cost: <span style="font-weight: bolder">Free</span></li>
                                    <li>Total: <span style="font-weight: bolder">${{ $total }}</span></li>
                                </ul>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <div class="flex-w flex-m m-r-20 m-tb-5">
                        <a href="{{ route('products') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Continue Shopping</a>
                        &nbsp;&nbsp;
                        @guest
                        <a href="{{ route('login') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Login for Checkout</a>
                        @else
                        <a href="{{ route('checkout') }}" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Checkout</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
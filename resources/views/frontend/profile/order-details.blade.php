@extends('layouts.frontend.layout')
@section('account') active-menu @endsection

@section('content')
<style>
    .mytable tr td {
        padding: 10px;
    }
</style>

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url({{ asset('frontend/images/bg-01.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        Order Details {{ $order->order_no }}
    </h2>
</section>

<section class="bg0 p-t-75 p-b-75">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="txt-center mytable" border="1">

                    <tr>
                        <td width="30%">
                            <img src="{{ asset('frontend/images/icons/logo-01.png') }}" alt="">
                        </td>
                        <td width="40%">
                            <h4><strong>Coza Store</strong></h4>
                            <span><strong>Mobile no: </strong>01685 970744</span><br>
                            <span><strong>Email: </strong>injam.cse@gmail.com</span><br>
                            <span><strong>Address: </strong>F Block, New Market, Jessore</span>
                        </td>
                        <td width="30%">
                            <strong>Order no: {{ $order->order_no }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3"><h4>Order Details</h4></td>
                    </tr>
                    <tr>
                        <td><strong>Product Name & Image</strong></td>
                        <td><strong>Color & Size</strong></td>
                        <td><strong>Quantity & Price</strong></td>
                    </tr>
                    @foreach ($order->orderdtails as $details)
                    <tr>
                        <td>
                            <img src="{{ asset($details->product->image) }}" height="80" alt="{{ $details->product->name }}"> <br>
                            {{ $details->product->name }}
                        </td>
                        <td>
                            {{ $details->color->name }},
                            {{ $details->size->name }}
                        </td>
                        <td>
                            {{ $details->quantity }}x{{ $details->product->price }} = 
                            {{ $details->quantity * $details->product->price }}
                        </td>
                    </tr>
                    @endforeach

                    <tr>
                        <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                        <td>
                            <strong>${{ $order->total_price }}</strong>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Shipping Info</strong></td>
                        <td colspan="2">
                            <strong>Name: </strong>{{ $order->shipping->name }} <br>
                            <strong>Email: </strong>{{ $order->shipping->email }} <br>
                            <strong>Phone: </strong>{{ $order->shipping->mobile }} <br>
                            <strong>Address: </strong>{{ $order->shipping->address }}
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Billing Info</strong></td>
                        <td colspan="2">
                            <strong>Payment Method: </strong>{{ $order->payment->payment_method }} <br>
                            @if ($order->payment->payment_method == 'bKash')
                                <strong>Transaction No: </strong>{{ $order->payment->transaction_number }}
                            @endif
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</section>

@endsection
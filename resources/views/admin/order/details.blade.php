@extends('layouts.admin.admin')
@section('open-order') menu-open @endsection
{{-- @section('active-pending') active @endsection --}}

@section('content')

<style>
    .mytable tr td {
        padding: 10px;
    }
</style>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Order Details &mdash; {{ $order->order_no }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Orders</li>
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

                    <table class="table text-center mytable bordered" border="1">
    
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
                                <strong>{{ $details->quantity }}</strong> x <strong>{{ $details->product->price }}</strong> = 
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

                <div class="card-footer">
                    <div class="float-right">
                        {{-- {{ $orders->links() }} --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
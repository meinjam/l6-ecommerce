@extends('layouts.frontend.layout')
@section('account') active-menu @endsection

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92"
    style="background-image: url({{ asset('frontend/images/bg-01.jpg') }});">
    <h2 class="ltext-105 cl0 txt-center">
        Your Orders
    </h2>
</section>

<section class="bg0 p-t-75 p-b-75">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->total_price }}</td>
                                <td>
                                    <span class="badge badge-info">
                                        {{ $order->status == 0 ? 'Pending' : 'Approved' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection
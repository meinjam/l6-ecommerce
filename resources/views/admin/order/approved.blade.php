@extends('layouts.admin.admin')
@section('open-order') menu-open @endsection
@section('active-approved') active @endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Approved Orders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Approve Order</li>
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

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Total Price</th>
                                <th>Payment Method</th>
                                <th>Created At</th>
                                <th width="17%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->total_price }}$</td>
                                <td>{{ $order->payment->payment_method == 'bKash' ? $order->payment->payment_method .'('. $order->payment->transaction_number .')' : $order->payment->payment_method }}
                                </td>
                                <td>{{ $order->created_at->format('h:i a, d M Y') }}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-sm">Approved</a>
                                    <a href="{{ route('details.order', $order->order_no) }}"
                                        class="btn btn-primary btn-sm">Details</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    <div class="float-right">
                        {{ $orders->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
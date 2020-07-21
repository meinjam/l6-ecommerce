<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller {

    public function pending() {
        $orders = Order::with(['payment'])->where( 'status', 0 )->latest()->paginate( 10 );
        // return response()->json( $orders );
        return view( 'admin.order.pending', compact( 'orders' ) );
    }

    public function approved() {
        $orders = Order::with(['payment'])->where( 'status', 1 )->latest()->paginate( 10 );
        // return response()->json( $orders );
        return view( 'admin.order.approved', compact( 'orders' ) );
    }

    public function order_details($id) {
        $order = Order::with(['payment','shipping','orderdtails'])->where('order_no', $id)->firstOrFail();
        // return response()->json($order);
        return view( 'admin.order.details', compact( 'order' ) );
    }

    public function approved_single($id) {
        $order = Order::where('order_no', $id)->firstOrFail();
        $order->status = 1;
        $order->save();
        return redirect()->back()->with( 'success', 'Order Approved Successfully.' );
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddtocartRequest;
use App\Order;
use App\OrderDtail;
use App\Payment;
use App\Product;
use App\Shipping;
use App\Size;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {

    public function add_to_cart( AddtocartRequest $request ) {

        // dd($request->all());
        $product = Product::where( 'id', $request->product_id )->first();
        $product_size = Size::where( 'id', $request->size_id )->first();
        $product_color = Color::where( 'id', $request->color_id )->first();

        Cart::add( [
            'id'      => $product->id,
            'qty'     => $request->qty,
            'price'   => $product->price,
            'name'    => $product->name,
            'weight'  => 550,
            'options' => [
                'size_id'    => $request->size_id,
                'size_name'  => $product_size->name,
                'color_id'   => $request->color_id,
                'color_name' => $product_color->name,
                'image'      => $product->image,
            ],
        ] );
        return redirect()->route( 'show.cart' )->with( 'success', 'Product Added successfully.' );
    }

    public function show_cart() {

        $carts = Cart::content();
        $total = Cart::initial();
        // dd($total);
        // return response()->json($carts);
        return view( 'frontend.cart', compact( 'carts', 'total' ) );
    }

    public function update_cart( Request $request ) {

        if ( $request->qty <= 0 ) {
            return redirect()->back()->with( 'error', 'Quantity can not be 0 or negative.' );
        }
        Cart::update( $request->rowId, $request->qty );
        return redirect()->back()->with( 'success', 'Product Updated successfully.' );
    }

    public function delete_cart( $id ) {

        Cart::remove( $id );
        return redirect()->back()->with( 'success', 'Cart Deleted successfully.' );
    }

    public function checkout() {

        if(session()->get('shipping_id')) {
            return redirect()->route('payment');
        }

        if (Cart::content() == NULL) {
            return redirect()->back()->with( 'error', 'No cart found.' );
        }

        $carts = Cart::content();
        return view( 'frontend.checkout', compact( 'carts' ) );
    }

    public function checkout_store( Request $request ) {

        if (count(Cart::content()) == 0) {
            return redirect('/')->with( 'error', 'No cart found.' );
        }

        $request->validate( [
            'name'    => 'required|min:3',
            'email'   => 'email',
            'mobile'  => 'required|regex:/^01\d{9}$/',
            'address' => 'required',
        ] );

        $checkout = new Shipping();
        $checkout->user_id = Auth::id();
        $checkout->name = $request->name;
        $checkout->email = $request->email;
        $checkout->mobile = $request->mobile;
        $checkout->address = $request->address;
        $checkout->save();
        session()->put( 'shipping_id', $checkout->id );
        return redirect()->route( 'payment' );
    }

    public function payment() {
        
        $carts = Cart::content();
        $total = Cart::initial();
        return view( 'frontend.payment', compact( 'carts', 'total' ) );
    }

    public function payment_store( Request $request ) {

        if (count(Cart::content()) == 0) {
            return redirect()->back()->with( 'error', 'No cart found.' );
        }

        $request->validate( [
            'payment_method' => 'required',
        ] );

        if ($request->payment_method == 'bKash' && $request->transaction_number == NULL) {
            return redirect()->back()->with( 'error', 'Please enter your transection number.' );
        }

        DB::transaction( function () use ( $request ) {

            $payment = new Payment();
            $payment->payment_method = $request->payment_method;
            $payment->transaction_number = $request->transaction_number;
            $payment->save();

            $order = new Order();
            $order->order_no = time();
            $order->user_id = Auth::id();
            $order->shipping_id = session()->get( 'shipping_id' );
            $order->payment_id = $payment->id;
            $order->total_price = $request->total_price;
            $order->save();

            $contents = Cart::content();
            foreach ( $contents as $content ) {
                $order_detail = new OrderDtail();
                $order_detail->order_id = $order->id;
                $order_detail->product_id = $content->id;
                $order_detail->color_id = $content->options->color_id;
                $order_detail->size_id = $content->options->size_id;
                $order_detail->quantity = $content->qty;
                $order_detail->save();
            }
        } );
        Cart::destroy();
        session()->forget('shipping_id');
        return redirect()->route( 'order.list' )->with( 'success', 'Order successfully added.' );
    }

    public function order_list() {

        $orders = Order::where('user_id', Auth::id())->latest()->get();
        // return response()->json($orders);
        return view( 'frontend.profile.orders', compact('orders') );
    }

    public function destroy( $id ) {
        //
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Color;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddtocartRequest;
use App\Product;
use App\Size;
use Cart;
use Illuminate\Http\Request;

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
        return view( 'frontend.cart', compact( 'carts', 'total' ) );
    }

    public function update_cart(Request $request) {
        
        if ($request->qty <= 0) {
            return redirect()->back()->with( 'error', 'Quantity can not be 0 or negative.' );
        }
        Cart::update($request->rowId, $request->qty);
        return redirect()->back()->with( 'success', 'Product Updated successfully.' );
    }

    public function delete_cart($id) {
        
        Cart::remove($id);
        return redirect()->back()->with( 'success', 'Cart Deleted successfully.' );
    }

    public function store( Request $request ) {
        //
    }

    public function show( $id ) {
        //
    }

    public function edit( $id ) {
        //
    }

    public function update( Request $request, $id ) {
        //
    }

    public function destroy( $id ) {
        //
    }
}

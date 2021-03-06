<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class frontendController extends Controller {

    public function index() {

        $products = Product::latest()->paginate(12);
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        // return response()->json($categories);
        return view( 'frontend.welcome', compact('products', 'categories') );
    }

    public function about() {

        return view( 'frontend.about' );
    }

    public function contact() {

        return view( 'frontend.contact' );
    }

    public function products() {
        
        $products = Product::latest()->paginate(12);
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        return view( 'frontend.product', compact('products', 'categories') );
    }

    public function category( $slug ) {
        
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->latest()->paginate( 12 );
        $categories = Product::select('category_id')->groupBy('category_id')->get();
        // return response()->json($products);
        return view( 'frontend.category', compact( 'category', 'products', 'categories' ) );
    }

    public function product_details( $slug ) {
        
        $product = Product::where('slug', $slug)->firstOrFail();
        // return response()->json($product);
        return view( 'frontend.details', compact( 'product' ) );
    }

    public function search( Request $request ) {
        $search = $request->get('search');
        
        $products = Product::where( 'name', 'like', '%' . $search . '%' )->latest()->get();
        return view( 'frontend.search', compact( 'products' ) );
    }

    public function destroy( $id ) {
        //
    }
}

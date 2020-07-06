<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontendController extends Controller {

    public function index() {

        return view( 'welcome' );
    }

    public function about() {

        return view( 'frontend.about' );
    }

    public function contact() {

        return view( 'frontend.contact' );
    }

    public function cart() {

        return view('frontend.cart');
    }

    public function create() {
        //
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

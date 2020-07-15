<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {

    public function profile( $slug ) {
        $profile = User::where( 'slug', $slug )->firstOrFail();
        // return response()->json( $profile );
        return view( 'frontend.profile.profile', compact( 'profile' ) );
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

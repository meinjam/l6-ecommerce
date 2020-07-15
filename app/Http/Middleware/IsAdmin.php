<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin {
    public function handle( $request, Closure $next ) {

        if ( Auth::user() ) {
            if ( Auth::user()->is_admin ) {
                return $next( $request );
            }
            return redirect( '/' )->with( 'error', 'You don\'t have permission to go there. ' );
        }
        return redirect( '/' )->with( 'error', 'You don\'t have permission to go there. ' );
    }
}

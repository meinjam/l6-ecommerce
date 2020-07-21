<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;

class CustomerController extends Controller {

    public function index() {
        $customers = User::where( 'is_admin', false )->latest()->paginate( 15 );
        return view( 'admin.customer.index', compact( 'customers' ) );
    }
}

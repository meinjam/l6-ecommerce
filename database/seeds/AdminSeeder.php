<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {

    public function run() {

        App\User::create( [
            'name'     => 'Injamamul Haque',
            'email'    => 'injam.bd.jsr@gmail.com',
            'password' => Hash::make( 'injam12345' ),
            'slug'     => 'injamamul-haque',
        ] );
    }
}

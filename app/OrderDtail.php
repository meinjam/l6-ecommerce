<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDtail extends Model {
    
    public function product() {
        return $this->belongsTo( 'App\Product' );
    }

    public function color() {
        return $this->belongsTo( 'App\Color' );
    }

    public function size() {
        return $this->belongsTo( 'App\Size' );
    }
}

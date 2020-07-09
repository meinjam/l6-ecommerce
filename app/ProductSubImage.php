<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubImage extends Model {

    protected $table = 'product_sub_images';
    protected $fillable = ['product_id', 'image'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'slug', 'price', 'short_desc', 'long_desc', 'image', 'category_id', 'brand_id'];

    public function category() {

        return $this->belongsTo( Category::class );
    }

    public function brand() {

        return $this->belongsTo( Brand::class );
    }

    public function colors() {

        return $this->belongsToMany( 'App\Color' );
    }

    public function sizes() {

        return $this->belongsToMany( Size::class );
    }

    public function sub_images() {

        return $this->hasMany( 'App\ProductSubImage', 'product_id', 'id' );
    }
}

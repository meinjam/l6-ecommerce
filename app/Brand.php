<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

    protected $fillable = ['name', 'slug', 'created_by', 'updated_by'];

    public function products() {

        return $this->hasMany( Product::class );
    }
}

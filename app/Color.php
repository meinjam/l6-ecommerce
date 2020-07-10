<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {

    protected $fillable = ['name', 'slug', 'created_by', 'updated_by'];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}

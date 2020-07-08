<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = ['name', 'slug', 'created_by', 'updated_by'];
}

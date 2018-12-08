<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodhomeImage extends Model {

    protected $table = 'foodhome_images';
    protected $fillable = [
        'url',
    ];

    public function foodHomes() {
        return $this->belongsTo('App\Foodhome');
    }

}

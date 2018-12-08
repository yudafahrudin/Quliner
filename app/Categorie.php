<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

    protected $table = 'categories';
    protected $fillable = [
        'name', 'code',
    ];

    public function foodHomes() {
        return $this->hasMany('App\Foodhome');
    }

}

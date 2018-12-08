<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foodhome extends Model {

    protected $table = 'foodhomes';
    protected $hidden = ['categorie_id','updated_at'];
    protected $appends = ['categories'];

    public function category() {
        return $this->belongsTo('App\Categorie');
    }
    public function images(){
        return $this->hasMany('App\FoodhomeImage');
    }

    public function getCategoriesAttribute() {
        $categories = Categorie::find($this->categorie_id);
        return (object) ['id' => $this->categorie_id, 'code' => $categories->code, 'name' =>$categories->name];
    }

}

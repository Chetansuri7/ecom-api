<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->hasone('App\Models\Category','id','category_id');
        return $this->hasone('App\Models\Category','keyword','merchandising_keywordId');
    }
    
    public function slider(){
        return $this->hasone('App\Models\CarouselSlider','','');
    }
}

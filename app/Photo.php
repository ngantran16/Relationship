<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   public function category(){
       return $this->belongsTo("App\Category","category_id","id");
   }

   public function tags(){
    return $this->belongsToMany("App\Tag","taggables","photo_id","tag_id");
}

public function photo_description(){
    return $this->hasOne("App\Photo_description","photo_id","id");
}
}

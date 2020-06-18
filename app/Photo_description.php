<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo_description extends Model
{
    protected $table = 'photo_descriptions';

    public function photo(){
        return $this->hasOne("App\Photo","id","photo_id");
    }
}

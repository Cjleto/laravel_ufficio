<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //Accessor
    public function getPathAttribute(){
        $url = $this->img_path;
        if(stristr($url, 'http') === false ){
            $url = 'storage/'.$url;
        }
        return $url;
    }

    //Mutator
    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }

        //relazione fra tabelle, definiamo che photos ha un album, appartiene ad un album
    public function album(){
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }
}

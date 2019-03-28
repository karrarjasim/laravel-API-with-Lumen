<?php

namespace App;
use Illuminate\Database\Eloquent\Model;



class Song extends Model 
{
  protected $fillable = [
    'name', 'artist', 'album'
];
  
    public function catrgories()
    {
      return $this->belongsTo("App\Category");
    }
}

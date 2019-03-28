<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Category 
{
    public function songs()
    {
      return $this->hasMany("App\Song");
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function histories(){
        return $this->hasmany(History::class);
    }
}

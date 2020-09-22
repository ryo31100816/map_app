<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function history(){
        return $this->hasMany(History::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}

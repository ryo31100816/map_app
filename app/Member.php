<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];

    protected $guarded = [
        'id', 
    ];

    public function history(){
        return $this->hasMany(History::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

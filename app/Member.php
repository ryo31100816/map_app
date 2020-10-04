<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Member extends Model
{
    protected $fillable = [
        'user_id', 'name','address','latitude','longitude'
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

    public function creates($data){
        DB::beginTransaction();
        try {
            $this->fill($data)->save();
            DB::commit();
            return;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug(print_r($this,true));
            echo $e->getMessage();
        }
    }

    public function updates($data) {
        DB::beginTransaction();
        try {
            $member_record = Member::findOrFail($this->id);
            $member_record->fill($data)->save();

            $user = $member_record->user;
            $user->name = $member_record->name;
            $user->save();
            DB::commit();
            return $member_record;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug(print_r($member_record,true));
            echo $e->getMessage();
        }
    }

    public function deletes($id) {
        DB::beginTransaction();
        try {
            $result = Member::findOrFail($id)->delete();
            DB::commit();
            return $result;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::info("Member${id}はありません。");
            abort(404);
            echo $e->getMessage();
        }
    }
}

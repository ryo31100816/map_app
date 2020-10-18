<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class History extends Model
{
    protected $fillable = [
        'trip_date', 'member_id','start','location_id','distance'
    ];

    protected $guarded = [
        'id', 
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function createByRequest($data){
        DB::beginTransaction();
        try {
            $this->fill($data)->save();
            DB::commit();
            return;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug(print_r("作成に失敗しました。${this}",true));
            abort(404);
            echo $e->getMessage();
        }
    }

    public function deleteByRequest($id) {
        DB::beginTransaction();
        try {
            $result = History::findOrFail($id)->delete();
            DB::commit();
            return $result;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::info("History${id}はありません。");
            echo $e->getMessage();
        }
    }
}

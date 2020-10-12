<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Location extends Model
{
    public function history(){
        return $this->hasMany(History::class);
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

    public function updateByRequest($data) {
        DB::beginTransaction();
        try {
            $record = Location::findOrFail($id);
            $record->fill($data)->save();
            DB::commit();
            return $record;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug(print_r("更新に失敗しました。${record}",true));
            abort(404);
            echo $e->getMessage();
        }
    }

    public function deleteByRequest($id) {
        DB::beginTransaction();
        try {
            $result = Location::findOrFail($id)->delete();
            DB::commit();
            return $result;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug("Location${id}はありません。");
            abort(404);
            echo $e->getMessage();
        }
    }
}

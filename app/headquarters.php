<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Headquarters extends Model
{
    protected $fillable = [
        'address', 'latitude', 'longitude',
    ];

    public function updateByRequest($data) {
        DB::beginTransaction();
        try {
            $record = Headquarters::findOrFail($this->id);
            $record->fill($data)->save();
            DB::commit();
            return $record;
        } catch(\PDOException $e) {
            DB::rollback();
            Log::debug(print_r($record,true));
            echo $e->getMessage();
        }
    }
}

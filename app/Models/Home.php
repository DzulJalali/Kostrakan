<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    public function getAll(){
        return DB::table('building_details')
                ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
                ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
                ->get();
    }
}

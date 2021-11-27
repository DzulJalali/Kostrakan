<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BuildingDetails extends Model
{
    protected $fillable = 
    [
        'alamat',
        'kota_daerah',
        'published_date',
        'status',
        'kategori',
        'jmlh_ruangan',
        'luas_bangunan',
        'jmlh_lantai',
        'kredit',
        'furnitur',
        'tarif',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
    ];

    protected $primaryKey = 'building_id';

    public function detailBangunan($id)
    {
        $detailBangunan = DB::table('building_details')->select('*')->where('building_id', $id)
                            ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
                            ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
                            ->leftjoin('users as user', 'user.user_id', '=', 'building_details.user_id')->first();
        return $detailBangunan;
    }

    public function getAll(){
        return DB::table('building_details')
                ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
                ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
                ->get();
                
    }

    public function storeBangunan($data)
    {
        DB::table('building_details')->insert($data);
    }

    public function editBangunan($id)
    {
        $detailBangunan = DB::table('building_details')->select('*')->where('building_id', $id)->first();
        return $detailBangunan;
    }

    public function updateBangunan($id, $data)
    {
        DB::table('building_details')->where('building_id', $id)->update($data);
    }

    public function deleteBangunan($id)
    {
        DB::table('building_details')->where('building_id', $id)->delete();
    }
}

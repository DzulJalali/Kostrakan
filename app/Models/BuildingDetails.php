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
        'published_date',
        'status',
        'kategori',
        'jmlh_ruangan',
        'luas_bangunan',
        'jmlh_lantai',
        'keterangan_fasilitas',
        'harga',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
    ];

    protected $table = 'building_details';
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

    //Mengambil dari Model Content Based Filter

    public function scopeAlamat($query, $alamat)
    {
        if($alamat)
        return $query = DB::table('building_details')
        ->where('alamat', 'like', '%'. $alamat. '%');
    }

    public function scopeKota($query, $nama_kk)
    {
        if($nama_kk)
        return $query = DB::table('building_details')
        ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
        ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
        ->where('nama_kk', 'like', '%'. $nama_kk. '%');
    }

    public function scopeTipe($query, $nama_tipe)
    {
        if($nama_tipe)
        return $query = DB::table('building_details')
        ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
        ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
        ->where('nama_tipe', 'like', '%'. $nama_tipe. '%');
    }

    public function scopeHarga($query, $harga)
    {
        switch ($harga)
        {
            case 'Minus 10000000':
                return $query = DB::table('building_details')->where('harga', '<', 10000000);
                break;
            case '10000000 - 20000000':
                return $query = DB::table('building_details')->whereBetween('harga', [10000000, 20000000]);
                break;
            case '20000000 - 30000000':
                return $query = DB::table('building_details')->whereBetween('harga', [20000000, 30000000]);
                break;
            case '30000000 - 40000000':
                return $query = DB::table('building_details')->whereBetween('harga', [30000000, 40000000]);
                break;
            case '40000000 - 50000000':
                return $query = DB::table('building_details')->whereBetween('harga', [40000000, 50000000]);
                break;
            case '50000000 - 60000000':
                return $query = DB::table('building_details')->whereBetween('harga', [50000000, 60000000]);
                break;
            case '60000000 - 70000000':
                return $query = DB::table('building_details')->whereBetween('harga', [60000000, 70000000]);
                break;
            case '70000000 - 80000000':
                return $query = DB::table('building_details')->whereBetween('harga', [70000000, 80000000]);
                break;
            case 'More 80000000':
                return $query = DB::table('building_details')->whereBetween('harga', '>', 80000000);
                break;
            default:
                return 0;
                break;
        }
    }

    public function scopePublishedDate($query, $publishedDate)
    {
        if($publishedDate)
        return $query = DB::table('building_details')
        ->where('published_date', 'like', '%'. $publishedDate. '%');
    }

    public function generateContentMatrix()
    {
        $buildingsDB = BuildingDetails::all();

        $buildingsAsociativeMatrix = array ();

        for($i = 0; $i < sizeof($buildingsDB); $i++)
        {
            $buildingsAsociativeMatrix[$i] = array(
                'building_id'           => $buildingsDB[$i]->building_id,
                'alamat'         => $buildingsDB[$i]->alamat,
                'published_date'        => $buildingsDB[$i]->published_date,
                'status'       => $buildingsDB[$i]->status,
                'jmlh_ruangan'     => $buildingsDB[$i]->jmlh_ruangan,
                'luas_bangunan'     => $buildingsDB[$i]->luas_bangunan,
                'jmlh_lantai'    => $buildingsDB[$i]->jmlh_lantai,
                'keterangan_fasilitas'   => $buildingsDB[$i]->keterangan_fasilitas,
                'harga'  => $buildingsDB[$i]->harga,
            );
        }
        return $buildingsAsociativeMatrix;
    }

    public function filteredByUser()
    {
        $filteredByUser = ContentBasedFilter::where('user_id', Auth::user()->user_id->get());

        $buildings = array();

        foreach($filteredByUser as $filteredByUser)
        {
            foreach(BuildingDetails::where('building_id', $filteredByUser->user_id)->get() as $content)
            {
                $buildings[] = $content->building_id;
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Daerah;
use App\Models\BuildingTypes;
use App\Models\Cities;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->bangunan = new Home();
        $this->daerah = new Daerah();
        $this->tipe = new BuildingTypes();
        $this->kotakabupaten = new Cities();
        $this->user = new User();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=[
            'bangunan' => $this->bangunan->getAll(),
            'dataDaerah'=>$this->daerah->all_data(),
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabupaten->getAll(),
            'user' => $this->user->getAll(),
        ];
        // dd($data);
        return view('home', $data);
    }

    // public function apiKecamatan()
    // {
    //     $data = [
    //         'dataKecamatan'=>$this->kecamatan->all_data(),
    //     ];
    //     return view('home',$data);
    // }
}

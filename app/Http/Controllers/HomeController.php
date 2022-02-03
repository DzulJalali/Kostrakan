<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Daerah;
use App\Models\BuildingTypes;
use App\Models\BuildingDetails;
use App\Models\Cities;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $this->buildingdetails = new BuildingDetails();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check())
        {
            $contentsByContentBasedFiltering = BuildingDetails::filteredByUser();
            // $building = BuildingDetails::all();
            // $detailbangunan = Home::all();
            // $cities = Cities::all();
            // $tipeBangunan = BuildingTypes::all();
            $data=[
                'detailbangunan' => $this->bangunan->paginate(6),
                'bangunan' => $this->buildingdetails->getAll(),
                'tipeBangunan' => $this->tipe->getAll(),
                'cities' => $this->kotakabupaten->getAll(),
                'user' => $this->user->getAll(),
            ];
            // dd($data, $building);
            return view('home', $data, compact('contentsByContentBasedFiltering'));
            // return view('home',compact(['contentsByContentBasedFiltering', 'building', 'detailbangunan', 'cities', 'tipeBangunan' ]),  $data, );
        }
        else
        {
            $data=[
                'detailbangunan' => $this->bangunan->paginate(6),
                'bangunan' => $this->buildingdetails->getAll(),
                'tipeBangunan' => $this->tipe->getAll(),
                'cities' => $this->kotakabupaten->getAll(),
                'user' => $this->user->getAll(),
            ];
            return view('home', $data);
        }
        
        
        // dd($contentsByContentBasedFiltering, $data);
    }
    
    
    public function searchwithkeyword(Request $request)
    {
        $search = $request->search;
        $bangunan = DB::table('building_details')
        ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
        ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
        ->where('alamat', 'LIKE', '%'.$search.'%')
        ->orWhere('harga', 'LIKE', '%'.$search.'%')->get();
        //dd($bangunan);
        return view('search', compact('bangunan'));
    }

    // public function advanceSearch(Request $request)
    // {
    //     $kk_id = $request->kk_id;
    //     $tipe_id = $request->tipe_id;

        
    //     $bangunan = DB::table('building_details')
    //     ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
    //     ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
    //     ->where('building_details.kk_id', $kk_id)
    //     ->where('building_details.tipe_id', $tipe_id)
    //     ->get();
    //     dd($bangunan);
        
    // }

    public function advanceSearch(Request $request)
    {
        $kk_id = $request->kk_id;
        $tipe_id = $request->tipe_id;

        if($kk_id != null && $tipe_id!= null)
        {
            $bangunan = DB::table('building_details')
            ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
            ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
            ->where('building_details.kk_id', $kk_id)
            ->where('building_details.tipe_id', $tipe_id)
            ->get();
        }
        else if($kk_id != null)
        {
            $kk_id = $request->kk_id;
            $bangunan = DB::table('building_details')
            ->leftjoin('cities as ct', 'ct.kk_id', '=', 'building_details.kk_id')
            ->where('building_details.kk_id', $kk_id)
            ->get();
        }
        else if($tipe_id!=null)
        {
            $tipe_id = $request->tipe_id;
            $bangunan = DB::table('building_details')
            ->leftjoin('building_types as bt', 'bt.tipe_id', '=', 'building_details.tipe_id')
            ->where('building_details.tipe_id', $tipe_id)
            ->get();
        }
        else
        {
            return "<h1 align='center'>Please select atleast one filter from dropdown</h1>";
        }

        if(count($bangunan)=="0"){
            echo "<h1 align='center'>no products found under this Category</h1>";
          }
          else
          {
          return view('search',[
            'bangunan' => $bangunan, 'display' => $bangunan[0]->nama_kk
          ]);
         }
        
    }
}

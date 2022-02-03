<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetails;
use App\Models\Kampus;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->detailBangunan = new BuildingDetails();
        $this->kampus = new Kampus();
    }

    public function index()
    {

    }

    public function getById($id)
    {
        $data=[
            'detail' => $this->detailBangunan->detailBangunan($id),
        ];

        return view('user.detail', $data);
    }

    public function getKampusById($id)
    {
        $data=[
            'detailKampus' => $this->kampus->data_id($id),
        ];

        return view('detailKampus', $data);
    }
}

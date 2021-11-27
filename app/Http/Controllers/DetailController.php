<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetails;

class DetailController extends Controller
{
    public function __construct()
    {
        $this->detailBangunan = new BuildingDetails();
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
}

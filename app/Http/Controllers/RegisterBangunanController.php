<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingDetails;
use App\Models\User;
use App\Models\RegisterBangunan;
use App\Models\Owner;
use App\Models\Cities;
use App\Models\BuildingTypes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Auth;

class RegisterBangunanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->bangunan = new BuildingDetails();
        $this->user = new User();
        $this->regisbangunan = new RegisterBangunan();
        $this->owner = new Owner();
        $this->tipe = new BuildingTypes();
        $this->kotakabu = new Cities();
    }

    public function approval()
    {
        return view('user.registerbangunan.approval');
    }

    public function displayByUser()
    {
        $data=[
            'status' => $this->user->getApprovedStatus(Auth::user()->user_id)[0], 
            'detailBangunanByUser' => $this->regisbangunan->getBangunanByUserId(),
            'user' => $this->user->getAll(),
        ];
        if($this->user->getApprovedStatus(Auth::user()->user_id)[0] == 'processing')
        {
            return redirect()->route('approvalBangunan');
        }
        //dd($this->user->getApprovedStatus(Auth::user()->user_id));
        return view('user.registerbangunan.index', $data);
    }

    public function createBangunanByOwner()
    {
        $data=[
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabu->getAll(),
            
        ];
        return view('user.registerbangunan.addbangunan', $data);
    }

    public function storeBangunanByOwner(Request $request)
    {
        $request->validate([
            'alamat' => 'required',
            'tipe_id' => 'required',
            'kk_id' => 'required',
            'published_date' => 'required',
            'status' => 'required',
            'jmlh_ruangan' => 'required',
            'luas_bangunan' => 'required',
            'jmlh_lantai' => 'required',
            'keterangan_fasilitas' => 'required',
            'harga' => 'required',
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image1 = $request->file('gambar1');
        $new_image1 = rand(). '.' .$image1->getClientOriginalExtension();

        $image2 = $request->file('gambar2');
        $new_image2 = rand(). '.' .$image2->getClientOriginalExtension();

        $image3 = $request->file('gambar3');
        $new_image3 = rand(). '.' .$image3->getClientOriginalExtension();

        $image4 = $request->file('gambar4');
        $new_image4 = rand(). '.' .$image4->getClientOriginalExtension();

        $data = 
        [
            'user_id' => Auth::user()->user_id,
            'tipe_id' => $request->get('tipe_id'),
            'kk_id' => $request->get('kk_id'),
            'alamat' => $request->alamat,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'jmlh_ruangan' => $request->jmlh_ruangan,
            'luas_bangunan' => $request->luas_bangunan,
            'jmlh_lantai' => $request->jmlh_lantai,
            'keterangan_fasilitas' => $request->keterangan_fasilitas,
            'harga' => $request->harga,
            'gambar1'=> $new_image1,
            'gambar2'=> $new_image2,
            'gambar3'=> $new_image3,
            'gambar4'=> $new_image4,
        ];
            $image1->move('uploads', $new_image1);
            $image2->move('uploads', $new_image2);
            $image3->move('uploads', $new_image3);
            $image4->move('uploads', $new_image4);

            $this->bangunan->storeBangunan($data);
            return redirect()->route('registerBangunan')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function editBangunanByOwner($id)
    {
        $data=[
            'editBangunan' => $this->bangunan->editBangunan($id),
            'tipeBangunan' => $this->tipe->getAll(),
            'cities' => $this->kotakabu->getAll(),
            
        ];
        return view('user.registerbangunan.editbangunan', $data);
    }

    public function updateBangunanByOwner(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'tipe_id' => 'required',
            'kk_id' => 'required',
            'published_date' => 'required',
            'status' => 'required',
            'jmlh_ruangan' => 'required',
            'luas_bangunan' => 'required',
            'jmlh_lantai' => 'required',
            'keterangan_fasilitas' => 'required',
            'harga' => 'required',
            'gambar1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input1 = $request->all();
  
        if ($image1 = $request->file('gambar1')) {
            $destinationPath = 'uploads';
            $image_name1 = date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->move($destinationPath, $image_name1);
            $input1['gambar1'] = "$image_name1";
        }
        else
        {
            unset($input1['gambar1']);
        }

        $input2 = $request->all();
  
        if ($image2 = $request->file('gambar2')) {
            $destinationPath = 'uploads';
            $image_name2 = date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $image_name2);
            $input2['gambar2'] = "$image_name2";
        }
        else
        {
            unset($input2['gambar2']);
        }

        $input3 = $request->all();
  
        if ($image3 = $request->file('gambar3')) {
            $destinationPath = 'uploads';
            $image_name3 = date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->move($destinationPath, $image_name3);
            $input3['gambar3'] = "$image_name3";
        }
        else
        {
            unset($input3['gambar3']);
        }
        
        $input4 = $request->all();
  
        if ($image4 = $request->file('gambar4')) {
            $destinationPath = 'uploads';
            $image_name4 = date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->move($destinationPath, $image_name4);
            $input4['gambar4'] = "$image_name4";
        }
        else
        {
            unset($input4['gambar4']);
        }

        $data = 
        [
            'user_id' => Auth::user()->user_id,
            'tipe_id' => $request->get('tipe_id'),
            'kk_id' => $request->get('kk_id'),
            'alamat' => $request->alamat,
            'published_date' => $request->published_date,
            'status' => $request->status,
            'jmlh_ruangan' => $request->jmlh_ruangan,
            'luas_bangunan' => $request->luas_bangunan,
            'jmlh_lantai' => $request->jmlh_lantai,
            'keterangan_fasilitas' => $request->keterangan_fasilitas,
            'harga' => $request->harga,
            'gambar1'=> $image_name1,
            'gambar2'=> $image_name2,
            'gambar3'=> $image_name3,
            'gambar4'=> $image_name4,
        ];
        //dd($data);
        $this->bangunan->updateBangunan($id, $data);
            return redirect()->route('registerBangunan')->with('success', 'Data Berhasil Di Update');
    }

    public function destroyBangunanByOwner($id)
    {
        $this->bangunan->deleteBangunan($id);
        return redirect()->route('registerBangunan')->with('success', 'Data Berhasil Di Hapus');
    }


    //Register Pemilik
    public function createRegisPemilik()
    {
        return view('user.registerbangunan.regispemilik');
    }


    public function storeRegisPemilik(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
        ]);

        $data = 
        [
            'owner_id' => $request->owner_id,
            'email' => $request->email,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'approved_status' => 'processing',
        ];

        //dd($data);
        $this->owner->storePemilik($data);
        return redirect()->route('approvalBangunan');
    }

    //approve owner
    public function approved($id)
    {
        $data=
        [
            'approved_status' => 'approved',
        ];
        $this->owner->ownerById($id, $data);
        return redirect()->route('admin.home');
    }

    public function removeApproved($id)
    {
        $data=
        [
            'approved_status' => null,
        ];
        $this->owner->ownerById($id, $data);
        return redirect()->route('admin.home');
    }

}

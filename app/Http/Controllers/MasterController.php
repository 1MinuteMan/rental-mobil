<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Master::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $master = new Master();
        $master->merk_mobil = $request->input('merk_mobil');
        $master->jenis_mobil = $request->input('jenis_mobil');
        $master->transmisi = $request->input('transmisi');
        $master->bahan_bakar = $request->input('bahan_bakar');
        $master->warna_mobil = $request->input('warna_mobil');
        $master->tahun_pembuatan = $request->input('tahun_pembuatan');
        $master->harga = $request->input('harga');
        $master->save();

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil ditambahkan',
            'data' => $master
        ],201); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $master = Master::find($id);
        if ($master){
            return response()->json([
                'status' => 200,
                'data' => $master
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'id' .$id. 'tidak ditemukan'
            ],404);
        }
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $master= Master::find($id);
        if($master){
            $master->merk_mobil = $request->merk_mobil ? $request->merk_mobil : $master->merk_mobil;
            $master->jenis_mobil = $request->jenis_mobil ? $request->jenis_mobil : $master->jenis_mobil;
            $master->transmisi = $request->transmisi ? $request->transmisi : $master->transmisi;
            $master->bahan_bakar = $request->bahan_bakar ? $request->bahan_bakar : $master->bahan_bakar;
            $master->warna_mobil = $request->warna_mobil ? $request->warna_mobil : $master->warna_mobil;
            $master->tahun_pembuatan = $request->tahun_pembuatan ? $request->tahun_pembuatan : $master->tahun_pembuatan;
            $master->harga = $request->harga ? $request->harga : $master->harga;
            $master->save();
            return response()->json([
                'status' => 200,
                'data' => $master
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>$id. 'tidak ditemukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $master = Master::where('id',$id)->first();
        if($master){
            $master->delete();
            return response()->json([
                'status' =>200,
                'message' =>'data berhasil dihapus'
            ],200);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>$id. 'tidak ditemukan'
            ],404);
        }
    }
}

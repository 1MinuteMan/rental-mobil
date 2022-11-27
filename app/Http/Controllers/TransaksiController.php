<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
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
        $transaksi = new transaksi();
        $transaksi->nama_pemesan = $request->input('nama_pemesan');
        $transaksi->tanggal_pemesanan = $request->input('tanggal_pemesanan');
        $transaksi->kode_pesanan = $request->input('kode_pesanan');
        $transaksi->mobil_pesanan = $request->input('mobil_pesanan');
        $transaksi->lama_rental = $request->input('lama_rental');
        $transaksi->total_pembayaran = $request->input('total_pembayaran');
        $transaksi->save();

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil ditambahkan',
            'data' => $transaksi
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
        $transaksi = Transaksi::find($id);
        if ($transaksi){
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi= transaksi::find($id);
        if($transaksi){
            $transaksi->nama_pemesan = $request->nama_pemesan ? $request->nama_pemesan : $transaksi->nama_pemesan;
            $transaksi->tanggal_pemesanan = $request->tanggal_pemesanan ? $request->tanggal_pemesanan : $transaksi->tanggal_pemesanan;
            $transaksi->kode_pesanan = $request->kode_pesanan ? $request->kode_pesanan : $transaksi->kode_pesanan;
            $transaksi->mobil_pesanan = $request->mobil_pesanan ? $request->mobil_pesanan : $transaksi->mobil_pesanan;
            $transaksi->lama_rental = $request->lama_rental ? $request->lama_rental : $transaksi->lama_rental;
            $transaksi->total_pembayaran = $request->total_pembayaran ? $request->total_pembayaran : $transaksi->total_pembayaran;
            $transaksi->save();
            return response()->json([
                'status' => 200,
                'data' => $transaksi
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
        $transaksi = Transaksi::where('id',$id)->first();
        if($transaksi){
            $transaksi->delete();
            return response()->json([
                'status' =>200,
                'message'=>'transaksi berhasil dihapus'
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangModel;

class apicontroller extends Controller
{
    public function get_all_barang()
    {
        return response()->json(BarangModel::all(), 200);
    }

    // public function insert_data_barang(Request $request)
    // {
    //     $insert_barang = new BarangModel;
    //     $insert_barang->nama_barang = $request->namaBarang;
    //     $insert_barang->jumlah_barang = $request->jmlBarang;
    //     $insert_barang->save();
    //     return response([
    //         'status' => 'OK',
    //         'messege' => 'Barang Disimpan',
    //         'data' => $insert_barang
    //     ], 200);
    // }

    public function insert_data_barang(Request $request)
    {
        $insert_barang = new BarangModel;
        $insert_barang->nama_barang = $request->namaBarang;
        $insert_barang->jumlah_barang = $request->jmlBarang;
        $insert_barang->save();
        return response([
            'status' => 'ok',
            'message' => 'Barang Disimpan',
            'data' => $insert_barang
        ], 200);
    }

    public function update_data_barang(Request $request, $id)
    {
        $check_barang = BarangModel::firstWhere('kode_baran', $id);
        if ($check_barang) {
            //tampilkan informasi jika barang  tersedia
            $data_barang = BarangModel::find($id);
            $data_barang->nama_barang = $request->namaBarang;
            $data_barang->jumlah_barang = $request->jmlBarang;
            $data_barang->save();
            return response([
                'status' => 'ok',
                'message' => 'Barang Berhasil diubah',
                'data' => $data_barang
            ], 200);
        } else {
            //jika data tidak ada 
            return response([
                'status' => 'tidak ditemukan',
                'message' => 'kode barang tidak ditemukan',

            ], 404);
        }
    }
}
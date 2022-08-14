<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transportasi;
use App\Loket;
use Illuminate\Support\Facades\Validator;

class PengirimanController extends Controller
{
    public function getAllTransportasi(Request $request){

        //dd($request->all()).die();
        $transportasi = Transportasi::orderby('id','DESC')->get();

        return response()->json(
           
            $transportasi
    );
    }
    public function getAllLoket(Request $request){

        //dd($request->all()).die();
        $loket = Loket::join('transportasi', 'loket.id_transportasi', '=', 'transportasi.id')->select('loket.id_loket', 'loket.nama_loket', 'loket.ongkir', 'transportasi.transportasi')->orderby('id_loket','DESC')->get();

        return response()->json(
           
            $loket
    );
    }
    public function createTransportasi(Request $request){

        $transportasi = new Transportasi();
        $transportasi->transportasi = $request->transportasi ;
        if($transportasi->save()){
            return response()->json([
                'success' => 1,
                'message' => 'Get Produk Berhasil',
                'history' => $transportasi
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => 'Get Produk Gagal'
        ]);
        


    }
    public function createLoket(Request $request){

        $loket = new Loket();
        $loket->id_transportasi = $request->id_transportasi;
        $loket->nama_loket = $request->nama_loket;
        $loket->ongkir = $request->ongkir;
        if($loket->save()){
            return response()->json([
                'success' => 1,
                'message' => 'Get Loket Berhasil',
                'history' => $loket
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => 'Get Loket Gagal'
        ]);
        


    }
}

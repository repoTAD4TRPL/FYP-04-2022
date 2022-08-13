<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class TransportasiController extends Controller
{
    function index($transportasi){
        $transportasi = DB::table('transportasi')
        ->join('loket', 'transportasi.id', '=', 'loket.id_transportasi')
        ->where('transportasi.transportasi', $transportasi)
        ->get();

        return response()->json([
            'success' => 1,
            'message' => 'Get Produk Berhasil',
            'transportasi' => $transportasi
        ]);
    }
}

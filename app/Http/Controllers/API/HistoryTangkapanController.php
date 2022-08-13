<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HistoryTangkapan;
use Illuminate\Support\Facades\Validator;

class HistoryTangkapanController extends Controller
{
    public function index(Request $request){

        //dd($request->all()).die();
        $produk = HistoryTangkapan::all();

        return response()->json(
           
            $produk
    );
    }
    public function create(Request $request){

        $history_tangkapan = new HistoryTangkapan();
        $history_tangkapan->tanggal_awal = $request->tanggal_awal;
        $history_tangkapan->tanggal_akhir = $request->tanggal_akhir;
        $history_tangkapan->total_tangkapan = $request->total_tangkapan;
        if($history_tangkapan->save()){
            return response()->json([
                'success' => 1,
                'message' => 'Tambah History Success',
                'history' => $history_tangkapan
            ]);
        }
        return response()->json([
            'success' => 0,
            'message' => 'Tambah History Gagal '
        ]);
        


    }
}

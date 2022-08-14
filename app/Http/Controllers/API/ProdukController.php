<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukController extends Controller
{
    public function index(Request $request){

        //dd($request->all()).die();
        $produk = Produk::all();

        return response()->json([
            'success' => 1,
            'message' => 'Get Produk Berhasil',
            'produks' => $produk
        ]);
    }

    public function delete(Request $request){
        $product = Produk::where('id', $request->id)->first();
        if ($product){
            $product->delete();
            return response()->json([
                'success' => 1,
                'message' => 'Produk berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Produk tidak ditemukan'
            ]);
        }
    }

    public function edit(Request $request){
        $product = Produk::where('id', $request->id)->first();
        if ($product){
            $product->edit($request->all());
            return response()->json([
                'success' => 1,
                'message' => 'Produk berhasil Diubah',
                'data'=> $request->all()
            ]);
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Produk tidak ditemukan',
                'data'=> $request->all()
            ]);
        }
    }

}

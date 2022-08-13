<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user['listUser'] = Produk::all();
        return view('produk')->with($user);
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
         // dd($request->all());die();

        $fileName = '';
        if($request->gambar->getClientOriginalName()){
            $file = str_replace(' ', '', $request->gambar->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
      
            $request->gambar->storeAs('public/produk/', $fileName);
        }
        // dd($request->all());
        $user = Produk::create(array_merge($request->all(), [
            'gambar' => $fileName
        ]));
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function edit_produk(Request $request)
    {
        if($request->edit_gambar->getClientOriginalName()){
            $file = str_replace(' ', '', $request->edit_gambar->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
      
            $request->edit_gambar->storeAs('public/produk/', $fileName);
        }else{
            $fileName='';
        }

        $update_table_produk=DB::table('produks')->where('id', $request->data_update_user)->update([
            'name'=>$request->edit_name,
            'harga'=>$request->edit_harga,
            'deskripsi'=>$request->edit_deskripsi,
            'stok'=>$request->edit_stok,
            'gambar'=>$fileName,
            'updated_at'=>Carbon::now(),
        ]);
        if($update_table_produk){
            return redirect()->route('produk.index');
        }else{
            echo('gagal update');
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
        $query = DB::table('produks')->where('id', $id)->delete();
        return redirect('/produk')->with('success', 'Data Dihapus');
    }

    public function hapus_produk(Request $request){
        // dd($request->data_delete_user);
        $product = DB::table('produks')->where('id', $request->data_delete_user)->delete();
        if ($product){
            return redirect()->route('produk.index');
        } else {
            return response()->json([
                'success' => 0,
                'message' => 'Produk tidak ditemukan'
            ]);
        }
    }
}

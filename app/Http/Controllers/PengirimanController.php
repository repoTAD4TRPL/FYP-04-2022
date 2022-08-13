<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;


class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengiriman');
    }

   
}

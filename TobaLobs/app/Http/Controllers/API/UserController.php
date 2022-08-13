<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    public function login(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user){
            if(password_verify($request->password, $user->password)){
                return response()->json([
                    'success' => 1,
                    'message' => 'selamat datang '.$user->name,
                    'user' => $user
                ]);
            }
            return $this->error('password salah');

        }
        return $this->error('email tidak ditemukan');
    }

    public function register(Request $request){
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|unique:users'
        ]);
        
        if($validasi->fails()){
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }


        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));


        if($user){
            return response()->json([
                'success' => 1,
                'message' => 'Register Berhasil',
                'user' => $user
            ]);

        }

        return $this->error('Registrasi Gagal');



    }

    public function error($pesan){
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}

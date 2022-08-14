<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller {
    public function index(){
        $transaksipanding['listpanding'] = Transaksi::join('loket', 'loket.id_loket', '=', 'transaksis.loket_id')->join('transportasi', 'loket.id_transportasi', '=', 'transportasi.id')->whereStatus("MENUNGGU")->get();
        $transaksiselesai['listselesai'] = Transaksi::join('loket', 'loket.id_loket', '=', 'transaksis.loket_id')->join('transportasi', 'loket.id_transportasi', '=', 'transportasi.id')->where("Status", "NOT LIKE", "%MENUNGGU%")->get();
        return view('transaksi')->with($transaksipanding)->with($transaksiselesai);
    }

    public function btlTrans($id){
        // $transaksi = Transaksi::with(['details.produk'])->where('id', $id)->first();
        $transaksi = DB::table('transaksis')
        ->join('users', 'users.id','=','transaksis.user_id')
        ->select('transaksis.*','users.fcm')
        ->where('transaksis.id', $id)
        ->where('transaksis.user_id', auth()->user()->id)
        ->get()->first();
        // dd($transaksi);
        DB::table('transaksis')->where('id', $id)->update(['status'=>'BATAL']);
        
        $this->pushNotif('Transaksi Dibatalkan', "Transaksi produk ".$transaksi->kode_payment." berhasil dibatalkan", $transaksi->fcm);

        return redirect('transaksi');
    }

    // public function confirm($id){
    //     $transaksi = Transaksi::with(['details.produk'])->where('id', $id)->first();
    //     $this->pushNotif('Transaksi Diproses', "Transaksi produk ".$transaksi->details[0]->produk->name." Diproses", $transaksi->user->fcm);
    //     $transaksi->update([
    //         'status' => "PROSES"
    //     ]);
    //     return redirect('transaksi');
    // }

    public function kirim($id){
        $transaksi = Transaksi::with(['details.produk'])->where('id', $id)->first();
        $this->pushNotif('Transaksi Dikirim', "Transaksi produk ".$transaksi->details[0]->produk->name." Dikirim", $transaksi->user->fcm);
        $transaksi->update([
            'status' => "DIKIRIM"
        ]);
        return redirect('transaksi');
    }

    public function selesai($id){
        $transaksi = Transaksi::with(['details.produk'])->where('id', $id)->first();
        $this->pushNotif('Transaksi Selesai', "Transaksi produk ".$transaksi->details[0]->produk->name."Selesai", $transaksi->user->fcm);
        $transaksi->update([
            'status' => "SELESAI"
        ]);
        return redirect('transaksi');
    }

    public function pushNotif($title, $message, $mfcm) {
        $mData = [
            // 'title' => "test",
            // 'body' => "body pesan"

            'title' => $title,
            'body' => $message
        ];

        $fcm[] = $mfcm;

        $payload = [
            'registration_ids' => $fcm,
            'notification' => $mData
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "Content-type: application/json",
                "Authorization: key=AAAAHCNdyis:APA91bElZ53HX-bVzkx-vFUZgKq90a5BXepcaUv98xnarjvcwqMQZCkkncle257wgty4zU009H2iffoj-AFCcAa3MQ0xxIWTV7YEcPgzs2zE-92m_1nBC0s87zVXxYt5SxNx8lzLl7Wf"
            ),
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = [
            'success' => 1,
            'message' => "Push notif success",
            'data' => $mData,
            'firebase_response' => json_decode($response)
        ];
        return $data;
    }

}

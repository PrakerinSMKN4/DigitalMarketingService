<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $paket = Paket::where('id_user', Auth::user()->id)->orderBy('created_at','desc')->first();
        if(!empty($paket)){
            $paket->nama = $paket->paket;
        }
        if(@$paket->status_pembayaran != 'selesai'){
            if(@$paket->status_pembayaran == 'pending'){
                $paket->paket = "Menunggu pembayaran";
            }else if(@!$paket->status_pembayaran == ''){
                $paket->paket = "Expired";
            }
        }
        return view("dashboard.index", compact('paket'));
    }

    function getDashboardData(Request $request){
        $bulan_arr = [
            ['kode' => '1', 'nama' => 'Januari'],
            ['kode' => '2', 'nama' => 'Februari'],
            ['kode' => '3', 'nama' => 'Maret'],
            ['kode' => '4', 'nama' => 'April'],
            ['kode' => '5', 'nama' => 'Mei'],
            ['kode' => '6', 'nama' => 'Juni'],
            ['kode' => '7', 'nama' => 'Juli'],
            ['kode' => '8', 'nama' => 'Agustus'],
            ['kode' => '9', 'nama' => 'September'],
            ['kode' => '10', 'nama' => 'Oktober'],
            ['kode' => '11', 'nama' => 'November'],
            ['kode' => '12', 'nama' => 'Desember']
        ];
        $res_arr = array();

        foreach($bulan_arr as $key => $value){
            $data = Paket::selectRaw('sum(harga) AS total_pemasukan')->whereMonth('created_at', $value['kode'])->where('status_pembayaran', 'selesai');
            if($request->input('tahun')){
                $data = $data->whereYear('created_at', $request->input('tahun'));
            }else{
                $data = $data->whereYear('created_at', date('Y'));
            }
            $data = $data->first();
            array_push($res_arr, [
                'nama_bulan' => $value['nama'],
                'total_pemasukan' => $data->total_pemasukan,
                
            ]);
        }
        @$totalUser = User::selectRaw('count(id) AS jmlh_user')->where('role', User::CLIENT_ADMIN)->first()->jmlh_user;
        if(!$totalUser) $totalUser = 0;
        @$totalPending = Paket::selectRaw('count(id) AS jmlh_pending')->where('status_pembayaran', 'pending')->first()->jmlh_pending;
        if(!$totalPending) $totalPending = 0;
        @$totalLunas = Paket::selectRaw('count(id) AS jmlh_lunas')->where('status_pembayaran', 'selesai')->first()->jmlh_lunas;
        if(!$totalLunas) $totalLunas = 0;
        $indep['jmlh_user'] = $totalUser;
        $indep['jmlh_request_pending'] = $totalPending;
        $indep['jmlh_request_lunas'] = $totalLunas;

        return response(['list_data'=>$res_arr,'indep_data'=>$indep]);
    }
}

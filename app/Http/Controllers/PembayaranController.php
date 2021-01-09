<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $requests = Paket::join('users', 'users.id', '=', 'paket.id_user')
                    ->orderBy('status_pembayaran')
                    ->selectRaw('paket.*, users.name');
        if($request->input('query')){
            $requests = $requests->where('users.name', 'LIKE', '%'. $request->input('query') .'%')
                        ->orWhere('status_pembayaran', 'LIKE', '%' . $request->input('query') . '%')
                        ->orWhere('paket', 'LIKE', '%' . $request->input('query') . '%')
                        ->orWhere('harga', 'LIKE', '%' . $request->input('query') . '%')
                        ->orWhere('jenis_pembayaran', 'LIKE', '%' . $request->input('query') . '%');
                        
        }

        
        $requests = $requests->get();
        return view('admin.pembayaran', compact('requests'));
    }


    public function verifikasi(Request $request){
        $status = Paket::where('id', $request->id)->update(['status_pembayaran'=>'selesai']);
        return response(['message' => 'Berhasil Diverifikasi!', 'status' => $status]);
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

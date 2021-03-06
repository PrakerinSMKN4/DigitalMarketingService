<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use DateTime;
use Faker\Provider\DateTime as ProviderDateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Invoice::join('users', 'users.id', '=', 'invoices.id_user')
                        ->join('paket', 'paket.id', '=', 'invoices.id_paket')
                        ->where('invoices.id_user', Auth::id())
                        ->orderBy('invoices.id','desc')->first();
        $idUser = "0";
        $res = "0";
        while(strlen($res)<=5){
            $idUser .= "0";
            $res = $idUser . Auth::id();
        }
        $data->id_user = $res;
        $data->tanggal_berakhir = $data->created_at->addYear();
        return view('dashboard.invoice', compact('data'));
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

    public function indexAdmin(Request $request){
        $invoices = Invoice::join('users', 'users.id', '=', 'invoices.id_user')->selectRaw('users.name, invoices.*');
        if($request->input('query')){
            $invoices = $invoices->where(function($query) use ($request){
                return $query->orWhere('name', 'LIKE', '%'. $request->input('query') .'%')
                ->orWhere('no_invoice', 'LIKE', '%'. $request->input('query') .'%');
            });
        }
        $invoices = $invoices->get();
        return view('admin.list_invoice', compact('invoices'));
    }

    public function showAdmin($id){
        $data = Invoice::join('users', 'users.id', '=', 'invoices.id_user')
                        ->join('paket', 'paket.id', '=', 'invoices.id_paket')
                        ->where('invoices.id', $id)
                        ->selectRaw('users.*, users.id AS id_user, paket.*, invoices.*')
                        ->orderBy('invoices.id','desc')->first();
        $idUser = "0";
        $res = "0";
        while(strlen($res)<=5){
            $idUser .= "0";
            $res = $idUser . $data->id_user;
        }
        $data->id_user = $res;
        $data->tanggal_berakhir = $data->created_at->addYear();
        return view('dashboard.invoice', compact('data'));
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

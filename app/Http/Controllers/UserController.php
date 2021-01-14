<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = User::where('role', User::CLIENT_ADMIN);
        if( $request->input('query') ){
            $users = $users->where(function($query) use ($request){
                return $query->orWhere('status_akun', 'LIKE', '%'. $request->input('query') .'%')
                ->orWhere('name', 'LIKE', '%'. $request->input('query') .'%')
                ->orWhere('no_handphone', 'LIKE', '%'. $request->input('query') .'%')
                ->orWhere('socmed', 'LIKE', '%'. $request->input('query') .'%');
            });
        }
        $users = $users->get();

        return view('admin.user', compact('users'));
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

    public function updateSocmed(Request $request){
        $result = User::find($request->id)->update(['socmed' => $request->socmed]);
        if($result){
            return response(['message' => 'Data berhasil diubah!','status' => 'success','title' => 'Success']);
        }else{
            return response(['message' => 'Data gagal diubah!','status' => 'error','title' => 'Error']);
        }
        
    }

    public function updateWebsite(Request $request){
        $result = User::find($request->id)->update(['website' => $request->website]);
        if($result){
            return response(['message' => 'Data berhasil diubah!','status' => 'success','title' => 'Success']);
        }else{
            return response(['message' => 'Data gagal diubah!','status' => 'error','title' => 'Error']);
        }
        
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

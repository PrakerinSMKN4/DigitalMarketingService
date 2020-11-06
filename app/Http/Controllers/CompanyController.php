<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\SocialMediaAccount;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$company = DB::table('companies')->where('id_pemilik', Auth::id())->first();
        @$company = Company::find($company->id);
        @$sosmedAccount['instagram'] = SocialMediaAccount::where([['id_company',$company->id],['social_media',"Instagram"]])->first();
        @$sosmedAccount['facebook']  = SocialMediaAccount::where([['id_company',$company->id],['social_media',"Facebook"]])->first();
        @$sosmedAccount['whatsapp']  = SocialMediaAccount::where([['id_company',$company->id],['social_media',"WhatsApp"]])->first();
        @$action = $company == null ? '/profile/store' : '/profile/update';
        @$method = $company == null ? 'POST' : 'PATCH';
        @$btnText = $company == null ? 'SUBMIT' : 'EDIT';

        return view('/profile', compact('company', 'sosmedAccount', 'action', 'method', 'btnText'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile');
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
        $rule = [
            'nama_company'=> 'required|string|',
            'alamat'=> 'required',
            'operational_time'=> 'required',
            'operational_time_close'=> 'required',
            'description'=> 'required',
            'vision'=> 'required',
            'mission'=> 'required'];

        $this->validate($request, $rule);

        $status = Company::create($request->all());

       /* company::updateOrCreate(['id' => $this->Id], 
        ['nama_company' => $this->nama_company, 
        'alamat' => $this->alamat, 
        'operational_time' => $this->operational_time, 
        'operational_time_close' => $this->operational_time_close,
        'description' => $this->description,
        'vision' => $this->vision,
        'mission' => $this->mission ]); */

        if($status){
            return redirect()->back()->with('status','Tambah data berhasil');
        }else {
            return redirect()->back()->with('status error', ' Tambah data gagal');
        }
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
        return view('profile', compact('companies'));
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

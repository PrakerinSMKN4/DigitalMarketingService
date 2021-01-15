<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\SocialMediaContacts;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin($id)
    {
        $company = Company::where('id_pemilik', $id)->first();
        $user = User::find($id);
        //@$company = Company::find($company->id);
        //@$sosmedAccount['instagram'] = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Instagram"]])->first();
       // @$sosmedAccount['facebook']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Facebook"]])->first();
       // @$sosmedAccount['whatsapp']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"WhatsApp"]])->first();
        @$action = $company == null ? '/profile/store' : '/profile/update';
        @$method = $company == null ? 'POST' : 'PATCH';
        @$btnText = $company == null ? 'SUBMIT' : 'EDIT';

        return view('admin.profile', compact('company','action', 'method', 'btnText','user'));
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('id_pemilik', Auth::id())->first();
        $user = User::find(Auth::id());
        //@$company = Company::find($company->id);
        //@$sosmedAccount['instagram'] = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Instagram"]])->first();
       // @$sosmedAccount['facebook']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Facebook"]])->first();
       // @$sosmedAccount['whatsapp']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"WhatsApp"]])->first();
        @$action = $company == null ? '/profile/store' : '/profile/update';
        @$method = $company == null ? 'POST' : 'PATCH';
        @$btnText = $company == null ? 'SUBMIT' : 'EDIT';

        return view('profile', compact('company','action', 'method', 'btnText','user'));
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
            'nama_company'=> 'required|string',
            'alamat'=> 'required',
            'description'=> 'required',
            'vision'=> 'required',
            'mission'=> 'required',
        ];
        unset($request->_token);
        $this->validate($request, $rule);
        if($request->hasFile('logo')){
            //get Filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extwnaion
            $extension = $request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('logo')->storeAs('public/images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }  
        $status = Company::updateOrCreate(['id_pemilik' => $request->id_pemilik],$request->all());
        
        $status->logo = $fileNameToStore;
        $status->save();
        //Update Field socmed di table user 
        $socmed = User::where('id', $request->id_pemilik)->update(['socmed'=>$request->instagram,]);

        //    $socmed = User::find($request->id_pemilik);
        //    $socmed->update(['socmed'=> $request->instagram,]);

        if($status){
            if(Auth::user()->role == User::CLIENT_ADMIN){
                return redirect('/company-profile')->with('success','Data berhasil disimpan');
            }else if(Auth::user()->role == User::SUPER_ADMIN){
                return redirect('/profile/'.$request->id_pemilik)->with('success','Data berhasil disimpan');
            }
        }else {
            return redirect()->back()->with('error', 'Data gagal disimpan');
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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = DB::table('companies')->where('id_pemilik', Auth::id())->first();
        @$company = Company::find($company->id);
        @$sosmedAccount['instagram'] = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Instagram"]])->first();
        @$sosmedAccount['facebook']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"Facebook"]])->first();
        @$sosmedAccount['whatsapp']  = SocialMediaContacts::where([['id_company',$company->id],['social_media',"WhatsApp"]])->first();
        @$action = $company == null ? '/profile/store' : '/profile/update';
        @$method = $company == null ? 'POST' : 'PATCH';
        @$btnText = $company == null ? 'SUBMIT' : 'EDIT';

        return view('/profile_edit', compact('company', 'sosmedAccount', 'action', 'method', 'btnText'));
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
        $data = Company::find($id);
        $rule = [
            'nama_company'=> 'required|string|',
            'alamat'=> 'required',
            'operational_time'=> 'required',
            'operational_time_close'=> 'required',
            'description'=> 'required',
            'vision'=> 'required',
            'mission'=> 'required'];

        $this->validate($request, $rule);

        $data->update($request->all());

       return redirect('profile')->with('success','Edit data berhasil');
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

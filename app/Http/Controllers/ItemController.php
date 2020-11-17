<?php

namespace App\Http\Controllers;

use App\Models\ItemPage;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $itempages = ItemPage::all();

        return view('/setting_div', compact('itempages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content');
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
       /* $rule = [
            'judul'=> 'required|string|',
            'keterangan'=> 'required|string'
        ]; */

       // dd($request);
        $request->validate([
            'multimedia' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'judul'=> 'required|string|',
            'keterangan'=> 'required|string'
        ]);
    
        $imageName = time().'.'.$request->multimedia->extension();  
     
        $request->multimedia->move(public_path('images'), $imageName);


        ItemPage::create($request->all());

        if($request){
            return redirect('/setting')->with('success', 'Item Pages berhasil diubah');
         }else{
             return redirect('content')->with('error', 'Item Pages gagal diubah');
         } 

      
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
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemPage $itempage)
    {
        //
       // dd($itempage);
       return view('content_edit', compact('itempage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemPage $itempages)
    {
        //

        //dd($request);
        $data = ItemPage::find($request,);

        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required'        
            ]);

    
     
     //ItemPage::where('id', $itempages)->update($request->all());
       
        ItemPage::where('id', $itempages)->update([
            'judul'=> $request->judul,
            'keterangan'=> $request->keterangan
        ]);

        return redirect()->route('settingDiv')
                    ->with('success','Product updated successfully');
        
        
        /* 
       $imageName = time().'.'.$request->multimedia->extension();  
     
        $request->multimedia->move(public_path('images'), $imageName);

         $itempages->update($request->all());

        return redirect()->route('settingDiv')
                    ->with('success','Product updated successfully'); */ 

    } 

   /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = ItemPage::destroy($id);
        return redirect('/setting/id')->with("status",$status);
        
    }
}

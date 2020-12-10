<?php

namespace App\Http\Controllers;

use App\Models\ItemPage;
use App\Models\MenuPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

       $itempages = ItemPage::where('id_pages', $id)->get();
       // $itempages = ItemPage::all();

        $menupages = MenuPage::all();

        $data = $id;

        return view('/setting_div', compact('itempages', 'menupages', 'data'));
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
        $request->validate([
            'multimedia' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'judul'=> 'required|string|',
            'keterangan'=> 'required|string',
            'id_pages'=> 'required'
        ]);
        // $item =  ItemPage::create($request->all());
        // if($request->hasFile('multimedia'))
        // {
        //     $request->file('multimedia')->move('images/item_pages_images/', $request->file('multimedia')->getClientOriginalName());
        //     $item->multimedia = $request->file('multimedia')->getClientOriginalName();
        //     $item->save();
        // }  
        // else{
        //     $fileNameToStore = 'noimage.jpg';
        // }    
       // handle FIle upload
        if($request->hasFile('multimedia')){
            //get Filename with the extension
            $filenameWithExt = $request->file('multimedia')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extwnaion
            $extension = $request->file('multimedia')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('multimedia')->storeAs('public/multimedia', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }  
        $data = new ItemPage;
        $data->judul = $request->input('judul');
        $data->keterangan = $request->input('keterangan');
        $data->id_pages = $request->input('id_pages');
        $data->multimedia = $fileNameToStore;
        $data->save();

         return redirect()->back()->with('success', 'Item Pages berhasil ditambah');
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
       return view('content_edit', compact('itempage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
       // dd($request);
        //$data = ItemPage::find($request,);
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required'        
            ]);
        //handle FIle upload
     if($request->hasFile('multimedia')){
        //get Filename with the extension
        $filenameWithExt = $request->file('multimedia')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get just ext
        $extension = $request->file('multimedia')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //upload image
        $path = $request->file('multimedia')->storeAs('public/multimedia', $fileNameToStore);
    }
    
    $data = ItemPage::find($id);
    $data->judul = $request->input('judul');
    $data->keterangan = $request->input('keterangan');
    if($request->hasFile('multimedia')){ 
        $data->multimedia = $fileNameToStore;
    }
    $data->update($request->all());
 
    /* ItemPage::where('id', $id)->update([
        'judul'=> $data->judul,
        'keterangan'=> $request->keterangan,
        'multimedia'=> $request->multimedia
         ]);  */
         //ItemPage::where('id', $itempages)->update($request->all());
        return redirect()->back()->with('success','Product updated successfully'); 

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
        return redirect()->back()->with("status",$status);
        
    }
}

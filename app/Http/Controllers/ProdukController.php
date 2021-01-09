<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {

        $products = Product::where('id_user', $id);
        if( $request->input('query') ){
            $products = $products->where('nama','LIKE', '%'. $request->input('query') .'%')
                        ->orWhere('harga', 'LIKE', '%'. $request->input('query') .'%')
                        ->orWhere('jenis', 'LIKE', '%'. $request->input('query') .'%');
        }

        $products = $products->get();
        $id_user = $id;
        
        return view('admin.product', compact('products', 'id_user'));
        //
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
        //dd($request);
        $rule = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'name'=> 'required|string|',
            'price'=> 'required'
            ];
            
        $this->validate($request, $rule);

        // handle FIle upload
        /*  if($request->hasFile('image')){
            //get Filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extwnaion
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/multimedia', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }  */

        $path = $request->file('image')->store('public/images');

        $data = new Product;
        $data->nama = $request->input('name');
        $data->detail = $request->input('detail');
        $data->deskripsi = $request->input('description');
        $data->jenis = $request->input('type');
        $data->harga = $request->input('price');
        $data->id_user = $request->input('id_user');
        $data->image = $path;
        $data->save(); 
       
       // $status = Product::create($request->all());

        return redirect()->back()->with('success', 'Produk berhasil ditambah');
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
    public function edit(Product $product)
    {
        

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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        
        $product = Product::find($id);
        if($request->hasFile('image')){
            $request->validate([
              'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $product->image = $path;
        }
        $product->nama = $request->name;
        $product->detail = $request->detail;
        $product->harga = $request->price;
        $product->jenis = $request->type;
        $product->deskripsi = $request->description;
        $product->save();
    
        return redirect()->route('admin-user')
                        ->with('success','Post updated successfully');
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
      //  $status = Product::destroy($id);

        $data = Product::where('id',$id)->first(['image']);
        Storage::delete('public/images/'.$data->image);
        $product = Product::where('id',$id)->delete();
       
       return redirect()->back()->with("success", 'Product Deleted Successfully');
    }
}

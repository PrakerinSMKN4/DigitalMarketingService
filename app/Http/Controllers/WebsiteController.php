<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plan = Paket::where('id_user', Auth::id())->whereRaw('( status = "active" OR status_pembayaran = "pending" )')->orderBy('id', 'desc')->first();
        $website = null;
        $message = "Anda belum membeli plan untuk website";
        if($plan){
            if($plan->status_pembayaran == 'pending'){
                $message = "Anda belum menyelesaikan pembayaran";
                return view('dashboard.website', compact('website', 'message'));
            }
            switch(strtolower($plan->paket)){

                case 'bundle premium':
                    $website = $plan;
                    break;
                case 'bundle gold':
                    $website = $plan;
                    break;
                case 'bundle regular':
                    $website = $plan;
                    break;
                case 'web premium':
                    $website = $plan;
                    break;
                case 'web gold':
                    $website = $plan;
                    break;
                case 'web regular':
                    $website = $plan;
                    break;
            }
        }
        return view('dashboard.website',compact('website', 'message'));
    }

    public function showListProduct(Request $request){
        $products = Product::where('id_user', Auth::id());
        if($request->input('query')){
            $products = $products
                        ->where(function($query) use ($request){
                            return $query->orWhere('harga', 'LIKE', '%'. $request->input('query') .'%')
                            ->orWhere('nama', 'LIKE', '%'. $request->input('query') .'%')
                            ->orWhere('jenis', 'LIKE', '%'. $request->input('query') .'%')
                            ->orWhere('deskripsi', 'LIKE', '%'. $request->input('query') .'%')
                            ->orWhere('detail', 'LIKE', '%'. $request->input('query') .'%');
                        });
        }
        //$products = Product::where('id_pemilik', Auth::id())->get();
        $products = $products->get();
        $id_user = Auth::id();
       // $url = Storage::url('$path');

        return view('dashboard.website.list-product', compact('products','id_user'));

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
        $rule = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'name'=> 'required|string|',
            'price'=> 'required',
            'type'=> 'required'
            ];
            
        $this->validate($request, $rule);

        // handle FIle upload
         /* if($request->hasFile('image')){
            //get Filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extwnaion
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }  */~

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
    public function edit($id)
    {
        //
       // dd($id);
       $data = Product::findorfail($id);
        return view('dashboard.website.product_edit', compact('data'));
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
        //dd($request);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
         $product = Product::findorfail($id);
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

       
       /* //$awal = $ubah->image;
        
        $product = [
            'nama' => $request['name'],
            'gambar' => $request['image'],
            'detail' => $request['detail'],
            'harga' => $request['price'],
            'jenis' => $request['type'],
            'deskripsi' => $request['description'],
        ] ; 
        $request->image->move(public_path().'/images');
        $ubah->update($product);*/
        return redirect()->route('/list-product')
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
        /*
        $data = Product::where('id',$id)->first(['image']);
        Storage::delete('public/images/'.$data->image);
        $product = Product::where('id',$id)->delete(); */
       
        $hapus = Product::findorfail($id);

        $file = public_path('/storage/images').$hapus->image;
        //cek Jika ada gambar
        if (Storage::exists($file)){
            //Maka Hapus file di folder public/iamges
            Storage::delete($file);
        }
        $hapus->delete();
       return redirect()->back()->with("success", 'Product Deleted Successfully');
    }
}

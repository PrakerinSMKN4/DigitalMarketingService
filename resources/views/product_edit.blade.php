    <head>
        <title>Profile</title>
    
        {{-- Plugin --}}
        <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
        <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>
    
        <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    </head>
    
    <body>
    
        
        <div class="row h-100 w-100 m-0">
    
            {{-- Content --}}
            <div class="col" style="background: #DFD9D9;">
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="row mt-3 p-3">
                <div class="col offset-1 mr-3" style="background: white;">
                    <div class="row justify-content-center m-3">
                        <div class="col-auto">
                            <i class="fa fa-id-card fa-2x" aria-hidden="true"></i>
                        </div>
                    </div>
                <form  method="POST" action="{{ route('product_update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    {{-- Nama --}}
                    <div class="row m-3">
                        <div class="form-group ">
                            <label>Product Name</label>
                            <input type="text" class="form-control" style="width:300px" name="name" value="{{ $product->nama }}">
                        </div>
                    </div>                        
                    {{-- Detail --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Detail</label><br>
                            <textarea cols="40" rows="3" style="resize:none" name="detail"> {{$product->detail }}</textarea>
                        </div>
                    </div>
                    {{-- Harga --}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Price</label><br>
                            <input cols="40" rows="3" style="resize:none" name="price" value="{{$product->harga }}"> 
                        </div>
                    </div>
                    {{--Jenis--}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Type</label><br>
                            <input cols="40" rows="3" style="resize:none" name="type" value="{{$product->jenis }}"> 
                        </div>
                    </div>
                    {{--deskripsi--}}
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Deskripsi</label><br>
                            <textarea cols="40" rows="3" style="resize:none" name="description"> {{$product->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="form-group">
                            <label>Image</label><br>
                            {{-- <img src=" {{asset("images/item_pages_images/$itempage->multimedia")}}" alt="" style="width: 70%">  --}}
                           {{-- <img src="/storage/app/public/multimedia/{{$product->multimedia}}" alt="" style="width: 70%">  --}}
                           <img src="{{ Storage::url($product->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control" >
                    </div>
                    {{-- <div class="col-md-6">
                        <input type="file" name="multimedia" class="form-control" value=" {{$itempage->multimedia }}">
                    </div> --}}
                    
                    <div class="row m-4">
                        <button class="btn btn-dark mt-4" type="submit" style="width: 30%; height:60%;">SUBMIT</button>
                    </div> 
                </form>
            
        </div>
    </body>
    <script src="{{asset('/js/index.js')}}"></script>
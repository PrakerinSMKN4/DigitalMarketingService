<head>
    <!-- Bootstrap 4.5.x -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/e3dba10297.js" crossorigin="anonymous"></script>
    <!-- File Name Reader -->
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"
        crossorigin="anonymous"></script>
    <!-- Image Preview -->
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src)
            }
        };
    </script>
</head>

<body>
    <!-- Copy Here -->
    <div class="card p-3">
        <h4 class="text-center">Edit Product</h4>
        <form action="{{ route('/list-product-update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <!-- Product Name & Type -->
                <div class="row">
                    <!-- Product Name -->
                    <div class="col-md input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nama Produk</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ $data->nama}}">
                    </div>
                    <!-- Type -->
                    <div class="col-md input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Jenis Produk</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Product Type" name="type" value="{{ $data->jenis}}">
                        {{-- <div class="input-group-prepend">
                            <label class="input-group-text" for="productType">Type</label>
                        </div>
                        <select class="custom-select" id="productType">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select> --}}
                    </div>
                </div>
    
                <!-- Detail & Price -->
                <div class="row">
                    <!-- Detail -->
                    <div class="col-md input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Detail </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Detail" name="detail" value="{{ $data->detail}}">
                    </div>
                    <!-- Price -->
                    <div class="col-md input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" class="form-control" placeholder="Price" name="price" value="{{  $data->harga }}">
                    </div>
                </div>
    
                <!-- Image & Description -->
                <div class="row">
                    <!-- Image Preview & File Chooser -->
                    <div class="col-md m-auto">
                        <div class="row row-cols-1">
                            <!-- Image Preview -->
                            <div class="col mb-3 text-center"><img src="{{ Storage::url($data->image) }}" id="output" src="" class="img-fluid" height="300" width="300" /></div>
                            <!-- File Chooser -->
                            <div class="col input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" onchange="loadFile(event)" name="image"
                                        class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <label class="input-group-text">Deskripsi</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="description" rows="9">{{ $data->deskripsi}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- Save or Cancel -->
                <div class="row">
                    <div class="col"><!-- Offset --></div>
                    <div class="col text-right">
                        <a href="#" class="btn btn-danger" onclick="history.back()">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
@extends('Backend.master')
@section('content')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          
                            
                            <!-- Product Name -->
                            <div class="mb-3">
                                <label for="pname" class="form-label">Product Name</label>
                                <input type="text" name="pname" id="pname" class="form-control" value="{{$product->name}}" required>
                            </div>
                            
                            <!-- Product Description -->
                            <div class="mb-3">
                                <label for="pdescription" class="form-label">Description</label>
                                <textarea name="pdescription" id="pdescription" class="form-control" rows="5" required>{{$product->description}}</textarea>
                            </div>
                            
                            <!-- Product Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" value="{{$product->price}}" required>
                            </div>
                            
                           
                            
                            <!-- Product Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                               
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>


@endsection

@extends('Backend.master')
@section('content')
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                          
                            
                            <!-- Category Name -->
                            <div class="mb-3">
                                <label for="pname" class="form-label">Category Name</label>
                                <input type="text" name="cat_name" id="pname" class="form-control" value="{{$category->name}}" required>
                            </div>
                            
                            <!-- Category Description -->
                            <div class="mb-3">
                                <label for="pdescription" class="form-label">Description</label>
                                <textarea name="cat_description" id="pdescription" class="form-control" rows="5" required>{{$category->description}}</textarea>
                            </div>
                           
                            <!-- Submit Button -->
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update Category</button>
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

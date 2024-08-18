@extends('Frontend.master')

@section('content')
    <div class="container mt-5">
        <!-- Product Details Section -->
        <div class="row">
      
            <div class="col-md-6">
                <img src="{{url('/uploads/'.$products->image)}}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h3>{{$products->pname}}</h3>
                <p class="text-muted">Category: {{$products->pcategory}}</p>
                <p><strong>Price: {{$products->price}} BDT</strong></p>
                <p>{{$products->pdescription}}</p>
                <a href="{{route('add.cart', $products->id)}}" class="btn btn-primary">Add to Cart</a>
            </div>
           
        </div>

        <!-- Similar Items Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h4>Similar Items</h4>
            </div>
            <div class="row">
                @foreach ($multipleproduct as $mproducts)
                <div class="col-md-6">
                    <div class="card">
                        <img src="{{url('/uploads/'.$mproducts->image)}}" class="card-img-top" alt="Similar Product 1">
                        <div class="card-body">
                            <h5 class="card-title">{{$mproducts->pname}}</h5>
                            <p class="card-text">{{$mproducts->price}} BDT</p>
                            <a href="{{route('Fview.product', $mproducts->id)}}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

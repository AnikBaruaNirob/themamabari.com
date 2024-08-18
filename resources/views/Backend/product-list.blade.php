@extends('backend.master')

@section('content')

<h1>Product List</h1>

<a class="btn btn-success" href="{{route('product.add')}}">Create new product</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Description</th>
      <th scope="col">Price</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @foreach ($allProduct as $product)
  <tr>
      <th scope="row">{{$product->id}}</th>
      <td>
        <img src="{{url('/uploads/'.$product->image)}}" alt="" width="60">
      </td>
      <td>{{$product->pname}}</td>
      <td>{{$product->pcategory}}</td>
      <td>{{$product->pdescription}}</td>
      <td>{{$product->price}} BDT</td>
      
      <td>
        <a class="btn btn-success" href="{{route('view.product' , $product->id )}}">View</a>
        <a class="btn btn-info" href="{{route('product.edit' , $product->id )}}">Edit</a>
        <a class="btn btn-danger" href="{{route('product.delete' , $product->id )}}">Delete</a>
      </td>
    </tr>
  @endforeach
    
  
  </tbody>
</table>

{{ $allProduct->links() }}
@endsection
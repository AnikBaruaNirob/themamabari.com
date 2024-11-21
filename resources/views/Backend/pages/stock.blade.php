@extends('backend.master')

@section('content')

<div class="container">


<h1>Product Stock</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Category</th>
      <th scope="col">Stock</th>
    </tr>
  </thead>
  <tbody>

   @foreach ($allProduct as $product)
  <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->pname}}</td>
      <td>{{$product->pcategory}}</td>
      <td>{{$product->stock}} </td>
    </tr>
  @endforeach 
    
  
  </tbody>
</table>
</div>

@endsection
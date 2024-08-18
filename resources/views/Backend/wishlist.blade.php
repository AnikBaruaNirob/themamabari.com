@extends('Backend.master')

@section('content')

<h1>Category List</h1>


<a class="btn btn-success" href="{{url('/create-category')}}">Create Category</a>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Password</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tablebody>
 @foreach ($allcategory as $cat)
    
    <tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->email}}</td>
      <td>{{$cat->password}}</td>
      <td>{{$cat->description}}</td>
      <td>
        <img src="{{url('/uploads/category/'.$cat->image)}}" width="100px" height="100px"> 
      </td>
    </tr>
 @endforeach     
  </tablebody>


  
</table>

{{$allcategory->links()}}


@endsection
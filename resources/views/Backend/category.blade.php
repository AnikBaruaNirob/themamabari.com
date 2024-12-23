@extends('backend.master')

@section('content')
<div class="container">

<a class="btn btn-primary" href="{{route('category.form')}}">Create Category</a>
<h1>Category List</h1>

<!-- <button type="button" class="btn btn-primary">Primary</button> -->


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Parent</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($allCategory as $cat)
 
<tr>
      <th scope="row">{{$cat->id}}</th>
      <td>{{$cat->name}}</td>
      <td>{{$cat->parent_id}}</td>
      <td>{{$cat->description}}</td>
      <td>{{$cat->status}}</td>
      <td>
        <a class="btn btn-success" href="">View</a>
        <a class="btn btn-info" href="{{route('category.edit', $cat->id)}}">Edit</a>
        <a class="btn btn-danger" href="{{route('category.delete', $cat->id)}}">Delete</a>
      </td>
    </tr>

@endforeach
   

    
  </tbody>
</table>
</div>

{{ $allCategory->links() }}

@endsection

@extends('Backend.master')

@section('content')

<form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
@csrf

<div class="form-group">
    <label for="name">Name</label>
    <input name="cat_name" type="text" class="form-control" id="name"  placeholder="Enter Your Full Name">
    
  </div>

  <div class="form-group">
    <label for="parent_name">Category Parent</label>
    <select name="parent_id" id="parent_name">
      <option value="">select Parent Category</option>
      @foreach($allcategory as $cat)
    <option value="{{$cat->id}}">{{$cat->name}} </option>

      @endforeach
    </select>
    
  </div>
 
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="cat_description" class="form-control" id="description" rows="3" placeholder="Write Description Here"></textarea>
  </div>
 


  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
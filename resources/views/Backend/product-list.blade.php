@extends('backend.master')

@section('content')
<div class="container">
<a href="{{route('product.add')}}" class="btn btn-primary">Create new product</a>
<h1>Product List</h1>
<table class="table data-table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Image<                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    /th>
      <th scope="col">Product Category</th>
      <th scope="col">Product Description</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

 
    
  
  </tbody>
</table>
</div>


@endsection

@push('js')
<script type="text/javascript">

  $(function () {

    

    let table = $('.data-table').DataTable({

        processing: true,

        serverSide: false,

        ajax: "{{ route('ejax.product.list') }}",

        columns: [

            {data: 'id', name: 'id'},

            {data: 'pname', name: 'pname'},

            {data: 'image', name: 'image'},

            {data: 'pcategory', name: 'pcategory'},

            {data: 'pdescription', name: 'pdescription'},

            {data: 'price', name: 'price'},

            {data: 'stock', name: 'stock'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

    

  });

</script>

@endpush
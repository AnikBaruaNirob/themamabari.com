@extends('backend.master')

@section('content')

<section class="">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div style="text-align: center" class="mt-5 d-flex">
              <img style="height: 500px; width: 500px" class="" src="{{url('/uploads/'.$viewProduct->image)}}" />
          </div>
        </aside>


        <main class="col-lg-6">

        <div class="mt-5 ps-lg-5">

            <h4 class="title text-dark" ><b>Product Name: {{$viewProduct->pname}}</b></h4>

            <div class="mb-3">

              <span class="h5"><b>Product Price: {{$viewProduct->price}} Taka</b></span>

            </div>
            <div class="border rounded-2 px-3 py-2 bg-white">
                <div class="tab-content" id="ex1-content">
                  <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <h2><b>Description:</b></h2>
                    <h4 style="text-align: justify">{{$viewProduct->pdescription}}</h4>

                  </div>
                </div>

              </div>
{{--
            <div class="row">
              <dt class="col-3">Type:</dt>
              <dd class="col-9">Regular</dd>

              <dt class="col-3">Color</dt>
              <dd class="col-9">Brown</dd>

              <dt class="col-3">Material</dt>
              <dd class="col-9">Cotton, Jeans</dd>

              <dt class="col-3">Brand</dt>
              <dd class="col-9">Reebook</dd>
            </div> --}}

        </div>
        </main>
      </div>
    </div>
    <br>
    {{-- <div style="text-align: center">
        <a href="#" class="btn btn-warning shadow-0" style="color: black"><b>Buy now</b></a>
        <a href="#" class="btn btn-primary shadow-0">Add to cart</a>
        </div> --}}
  </section>

@endsection
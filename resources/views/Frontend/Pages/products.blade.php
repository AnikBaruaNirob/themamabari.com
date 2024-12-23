@extends('frontend.master')


@section('content')

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">

    @foreach ($products as $prod )
        
   
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">


        <div class="card text-black">
          <img src="{{url('/uploads/'.$prod->image)}}"
            class="card-img-top" alt="iPhone" width="50px" height="250px" />
          <div class="card-body">
            <div class="text-center mt-1">
              <h4 class="card-title">{{$prod->pname}}</h4>
              <h6 class="text-primary mb-1 pb-3">{{$prod->price}} BDT</h6>
            </div>

            <div class="text-center">
              <div class="p-3 mx-n3 mb-4" style="background-color: #eff1f2;">
                <h5 class="mb-0">Quick Look</h5>
              </div>

              
              <div class="d-flex flex-column mb-4 lead">
                <span class="mb-2">{{$prod->pdescription}}</span>
               
                <span style="color: transparent;">0</span>
              </div>
            </div>

            <div class="d-flex flex-row">
              
            <a href="{{route('Fview.product', $prod->id)}}"  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                View 
</a>
              <a href="{{ route('add.cart', $prod->id) }}"  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-danger flex-fill ms-1">Buy now</a>
            </div>
          </div>
        </div>
      </div>

      @endforeach
    
    </div>
  </div>
</section>

@endsection
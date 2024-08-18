@extends('Frontend.master')

@section('content')



<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h4 class="mb-3">Billing Address</h4>

                <form action="{{route('Order.Place')}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-6 mb-3">
                            <label for="Name">Name</label>
                            <input name="Customer_name" type="text" class="form-control" id="Name" placeholder="" required>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>
                       
                    

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input name="customer_email" type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="MobileNumber">Mobile Number <span class="text-muted"></span></label>
                        <input name="customer_mobile" type="MobileNumber" class="form-control" id="MobileNumber" placeholder="01711111111">
                        <div class="invalid-feedback">
                            Please enter a valid Mobile Number for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input name="customer_address" type="text" class="form-control" id="address" placeholder="House:121, ECB Chattar, Dhaka" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <select class="form-select" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="same-address">
                        <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="save-info">
                        <label class="form-check-label" for="save-info">Save this information for next time</label>
                    </div> -->

                    <hr class="mb-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="form-check">
                        <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                        <label class="form-check-label" for="credit">Cash on Delivery(COD)</label>
                    </div>
                    <div class="form-check">
                        <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="debit">Online Payment</label>
                    </div>
                    <!-- <div class="form-check">
                        <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div> -->
<!-- 
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-cvv">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div> -->

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout </button> 
               
                </form>
            </div>
            <div class="col-md-4">
                <h4 class="mb-3">Order Summary</h4>
                @if($mycart=session()->get('basket'))
                @foreach ($mycart as $cart )
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{$cart['pname']}}</span>
                      
                        <strong>{{$cart['subtotal']}}</strong>
                    </li>
                   
                    
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{ session('$totalSubtotal') }}</strong>
                    </li>
                </ul>
               
                               @else
                               @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection
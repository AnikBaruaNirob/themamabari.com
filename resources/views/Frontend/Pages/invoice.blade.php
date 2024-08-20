<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Invoice</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <h6 class="mb-3">From:</h6>
                                <div><strong>The Mamabari.com</strong></div>
                                <div>Street Address</div>
                                <div>111 Noya Paltan, 6th Floor, Polton , Dhaka-1000</div>
                                <div>Email: hello@themamabari.com</div>
                                <div>Phone: 0195220070</div>
                            </div>
                            <div class="col-sm-6 text-end">
                                <h6 class="mb-3">To: </h6>
                                <div><strong>{{$order->name}}</strong></div>
                                <div>Street Address</div>
                                <div>{{$order->address}}</div>
                                <div>Email:{{$order->email}} </div>
                                <div>Phone: {{$order->mobile}}</div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                
                                <h6 class="mb-3">Invoice #: {{$invoiceNumber}} </h6>
                                <h6>Invoice Date: {{$order-> created_at}}</h6>
                                <h6>Due Date: {{$dueDate}} </h6>
                            </div>
                            <div class="col-sm-6 text-end">
                          
                                <h6 class="mb-3">Total Amount Due:</h6>
                                <h2 class="text-danger">{{ number_format(array_sum(array_column(session()->get('basket'), 'subtotal')) * 1.10, 2) }} BDT</h2>
                       
                            </div>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($order->OrderDetails as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$item->product_name}}</td>
                                            <td class="text-center">{{$item->product_quantity}}</td>
                                            <td class="text-center">{{$item->product_unit_price}} BDT</td>
                                            <td class="text-center">{{$item->subtotal}} BDT</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-sm-5">
                            </div>
                            <div class="col-lg-4 col-sm-5 ms-auto">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="text-end"><strong>Subtotal</strong></td>
                                            <td class="text-end"><b> {{ array_sum(array_column(session()->get('basket'),'subtotal')) }}.00 BDT </b></td>
                                        </tr>
                                        <tr>
                                            <td class="text-end"><strong>Tax (10%)</strong></td>
                                            <td class="text-end">{{ number_format(array_sum(array_column(session()->get('basket'), 'subtotal')) * 0.10, 2) }} BDT</td>
                                        </tr>
                                        <tr>
                                            <td class="text-end"><strong>Total</strong></td>
                                            <td class="text-end"><strong>{{ number_format(array_sum(array_column(session()->get('basket'), 'subtotal')) * 1.10, 2) }} BDT</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="text-muted">
                                    Thank you for your business!
                                </p>
                                <a href="" class="btn btn-primary">Print Invoice</a>
                                <a href="#" class="btn btn-secondary">Download PDF</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

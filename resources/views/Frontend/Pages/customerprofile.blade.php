<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            @auth('customerGuard')
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ url('/uploads/customer/' . auth('customerGuard')->user()->image) }}" alt="Profile Picture" class="card-img-top" width= "100px" height="200px">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{ auth('customerGuard')->user()->name }}</h4>
                            <a href="#" class="btn btn-primary">Edit Profile</a>
                            <a href="{{ route('Home') }}" class="btn btn-success">Back To Home</a>
                            <a href="{{ route('Frontend.logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <h6>Full Name: {{ auth('customerGuard')->user()->name }}</h6>
                            <h6>Email Address: {{ auth('customerGuard')->user()->email }}</h6>
                            <h6>Phone Number: {{ auth('customerGuard')->user()->mobile }}</h6>
                            <h6>Address: {{ auth('customerGuard')->user()->address }}</h6>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Order List</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->status}}</td>
                                            <td>{{$order->total}}</td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">View</a>
                                               @if($order->status=='pending')
                                                <a href="{{route('cancel.order',$order->id)}}" class="btn btn-danger btn-sm">Cancel</a>
                                               @endif
                                                <a href="" class="btn btn-primary btn-sm">Invoice</a>
                                            </td>
                                        </tr>
                                 @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

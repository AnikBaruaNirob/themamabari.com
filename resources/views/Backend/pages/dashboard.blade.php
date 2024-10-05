@extends('Backend.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7f6;
        }
        .dashboard-card {
            padding: 30px;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .dashboard-card h5 {
            margin-bottom: 10px;
            color: #6c757d;
        }
        .dashboard-card h2 {
            margin-bottom: 0;
            font-weight: bold;
            color: #343a40;
        }
        .dashboard-card .icon-container {
            background-color: #007bff;
            padding: 20px;
            border-radius: 50%;
            color: #fff;
            font-size: 2rem;
        }
        .row {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Sales Dashboard</h1>
        <div class="row">
            <!-- Pending Sale -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Pending Sale</h5>
                        <h2>123</h2>
                    </div>
                    <div class="icon-container">
                        <i class="bi bi-hourglass-split"></i>
                    </div>
                </div>
            </div>
            <!-- Today's Sale -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Today's Sale</h5>
                        <h2>$1,200</h2>
                    </div>
                    <div class="icon-container" style="background-color: #28a745;">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                </div>
            </div>
            <!-- Total Customers -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Total Customers</h5>
                        <h2>456</h2>
                    </div>
                    <div class="icon-container" style="background-color: #ffc107;">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Total Orders -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Total Orders</h5>
                        <h2>{{$Orderlist}}</h2>
                    </div>
                    <div class="icon-container" style="background-color: #17a2b8;">
                        <i class="bi bi-cart"></i>
                    </div>
                </div>
            </div>
            <!-- Total Products -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Total Products</h5>
                        <h2>{{$Productlist}}</h2>
                    </div>
                    <div class="icon-container" style="background-color: #fd7e14;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>
            <!-- Today's Orders -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Today's Orders</h5>
                        <h2>65</h2>
                    </div>
                    <div class="icon-container" style="background-color: #6f42c1;">
                        <i class="bi bi-basket"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Total Pending Orders -->
            <div class="col-md-4">
                <div class="dashboard-card">
                    <div>
                        <h5>Total Pending Orders</h5>
                        <h2>32</h2>
                    </div>
                    <div class="icon-container" style="background-color: #dc3545;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



@endsection
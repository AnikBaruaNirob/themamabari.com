
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Mamabari | Best Organic Ecommerce site</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('/css/style.css')}}" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  @include('Frontend.Partials.header');

 
    <!-- Header Section Begin -->
    
    
    <!-- Header Section End -->

   @yield('content');

    <!-- Footer Section Begin -->
    
  @include('Frontend.Partials.footer');

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</body>

</html>
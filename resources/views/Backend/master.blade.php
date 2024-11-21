
<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2024 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">
  <head>
  @notifyCss
   
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>The Mama Bari| Best E-commerce Website in Bangladesh</title>
    <link rel="apple-touch-icon" sizes="57x57" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://coreui.io/demos/bootstrap/5.0/free/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="https://coreui.io/demos/bootstrap/5.0/free/css/vendors/simplebar.css">
    <!-- Main styles for this application-->
    <link href="https://coreui.io/demos/bootstrap/5.0/free/css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="https://coreui.io/demos/bootstrap/5.0/free/css/examples.css" rel="stylesheet">
    <!-- We use those styles to style Carbon ads and CoreUI PRO banner, you should remove them in your application.-->
    <link href="https://coreui.io/demos/bootstrap/5.0/free/css/ads.css" rel="stylesheet">
    <script src="https://coreui.io/demos/bootstrap/5.0/free/js/config.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/js/color-modes.js"></script>
    <link href="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <style type="text/css">

 
 #laravel-notify{
 z-index: 9999;
  } 
     </style>
  </head>
  <body>
  @include('notify::components.notify')
  @include('Backend.Partials.sidebar')

  
    <div class="wrapper d-flex flex-column min-vh-100">
      

@include('Backend.Partials.header')

     
         
       
       @yield('content')
      
     
      @include('Backend.Partials.footer')  

    </div>
   
    
 
 
    <!-- CoreUI and necessary plugins-->
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/simplebar/js/simplebar.min.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/chart.js/js/chart.umd.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/vendors/@coreui/utils/js/index.js"></script>
    <script src="https://coreui.io/demos/bootstrap/5.0/free/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
    </script>
   <x-notify::notify />
   @notifyJs
   @stack('js')
  </body>
 
</html>
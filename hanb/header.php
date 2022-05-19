<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Rumah Singgah || Basnas</title>

    <!-- Favicon -->
    <link rel="icon" href="hanb/img/core-img/favicon.ico">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Core Stylesheet -->
    <link href="hanb/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="hanb/css/responsive/responsive.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
    <link rel="stylesheet" href="dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="map/index.css" />
<!--  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> -->
    <style type="text/css">
        .form-control {
            height: 50px;
            font-size: 12px;
            color: #72728c;
            font-weight: 600;
            border: none;
            border-radius: 0;
        }
    </style>
    <style type="text/css">
        #mapid { height: 720px; }
 </style>
</head>

<body>
    <!-- Preloader -->
<!--     <div id="preloader">
        <div class="dorne-load"></div>
    </div> -->

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#dorneNav" aria-controls="dorneNav" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                        <!-- Nav -->
                        <div class="collapse navbar-collapse" id="dorneNav">
                            <ul class="navbar-nav mr-auto" id="dorneMenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Beranda</a>
                                </li>
                            </ul>
                                    <div class="dorne-signin-btn">
                                        <a href="login.php">Login</a>
                                    </div>
                                    <div class="dorne-signin-btn">
                                        <a href="index.php?hal=kamar">Lihat Daftar Kamar</a>
                                    </div>
                                  
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ***** Header Area End ***** -->

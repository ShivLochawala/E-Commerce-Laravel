<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .custom-container{
            height: 500px;
            padding-top: 100px; 
        }
        img.slider-img{
            height: 400px !important;
        }
        .custom-product{
            height: 600px;
        }
        .slider-text{
            background-color: #634d4d8a;
        }
        .trending-wrapper{
            margin: 30px;
        }
        .trending-wrapper h3{
            text-align: center;
        }
        .trending-image{
            height: 100px;
        }
        .trending-item{
            float: left;
            width: 20%;
            text-align: center;
        }
        .productDetail-img{
            height: 250px;
        }
        .search-box{
            width: 500px !important;
        }
        .footer{
            text-align:center;
        }
    </style>
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}
</body>
</html>
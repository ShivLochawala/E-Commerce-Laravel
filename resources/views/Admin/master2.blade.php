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
        body{
            background: gray;
        }
        .login_panel{
            margin: auto;
            width:300px;
            height:auto;
            background: white;
            border: 1px solid gray;
            border-radius: 10px;
            text-align:center;
            align:center;
            margin-top:100px;
            box-shadow: 5px 10px 18px black;
        }
        input{
            width:85%;
            height:40px;
            padding-left: 5px;
        }
        input:focus{
            box-shadow: 2px 5px 10px #66CCFF;
        }
        .btn-primary{
            width:100%;
            height:40px;
            background-color: #003399;
            color: white;
            border-radius: 5px;
        }
        .btn-primary:hover{
            background-color: #0099CC;
        }
        .login_panel a{
            color: black;
            text-decoration: none;
        }
        .login_panel a:hover{
            color: blue;
        }
        .error{
            color: red;
            float:left;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
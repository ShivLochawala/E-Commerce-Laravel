@if(!session()->has('admin'))
  <h1>You are not allow to access this page direct</h1>
@endif
<head>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin-top: 52px;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  padding-top: 52px;
  height: 1000px;
}
ul {
    list-style-type: none;
    margin-left: 0px !important;
    padding: 0px;
    margin-bottom: 0px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: fixed;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0; padding-top: 104px;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/admin-home">Electronic's</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session()->get('admin')['name']}} <span class="caret"></span></a>
          <ul class="dropdown-menu profile-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="/logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="sidebar">
  <a href="/admin-home" class="{{ Request::is('admin-home') ? 'active' : '' }}">Home</a>
  <ul>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle {{ (Request::is('view-products') ? 'active' : '') || Request::is('add-product') ? 'active' : '' }}" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Product<span class="caret"></span></a>
      <ul class="dropdown-menu profile-menu">
        <li><a href="/add-product" class="{{ Request::is('add-product') ? 'active' : '' }}">Add Product</a></li>
        <li><a href="/view-products" class="{{ Request::is('view-products') ? 'active' : '' }}">View Products</a></li>
      </ul>
    </li>
  </ul>
  <a href="">Order</a>
</div>
<div class="content">
@yield('content')
</div>
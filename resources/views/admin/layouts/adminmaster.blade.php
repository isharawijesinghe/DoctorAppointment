<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    <link href="admin/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="admin/img/logomi.png">
    <link  href="/css/regdoc.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid">
  <div class="row">
      <div class="sidebar col-md-3"> @include('admin.includes.header') </div>
      <div class="contents col-md-9"> @yield('content') </div>
  </div>

</div>



<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ URL::to('admin/js/main.js') }}"></script>

</body>
</html>

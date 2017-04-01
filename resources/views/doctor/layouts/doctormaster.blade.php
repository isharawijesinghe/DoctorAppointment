<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


    <link href="css/admin/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="css/admin/img/logomi.png">
    <link rel="stylesheet" type="text/css" href="css/admin/regdoc.css"/>
</head>
<body>

<div class="container-fluid">
  <div class="row">
      <div class="sidebar col-md-3"> @include('admin.includes.header') </div>
      <div class="contents col-md-9"> @yield('content') </div>
  </div>

</div>



<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!-- start: Javascript -->
<script src="css/admin/js/jquery.min.js"></script>
<script src="css/admin/js/jquery.ui.min.js"></script>
<script src="css/admin/js/bootstrap.min.js"></script>


<!-- plugins -->



<!-- custom -->
<script src="admin/js/main.js"></script>



</body>
</html>

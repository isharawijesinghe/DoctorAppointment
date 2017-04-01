<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Front/font-awesome.min.css">
    <link rel="stylesheet" href="css/Front/bootstrap.min.css">
    <link rel="stylesheet" href="css/Front/register.css">
    <link rel="stylesheet" href="css/Front/appointment.css">
    <link rel="stylesheet" href="css/Front/style.css">
    <link rel="stylesheet" href="css/Front/searchbar.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>


</head>
<body>
<div class="row">
    <div class="sidebar">@include('includes.header')</div>
    <div class="sidebar">@include('slider')</div>
</div>




    <div class="row">
        <div class="sidebar col-sm-3"> @include('register') </div>
        <div class="contents col-sm-9"> @yield('content') </div>
    </div>



<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<script src="css/Front/register.js"></script>

<script type="text/javascript">
    $('#search').on('keyup',function () {
        $value=$(this).val();

        $.ajax({
            method: 'GET',
            url: '{{URL::to('search')}}',
            data: {search:$value},
            success:function (data) {
                $('#results').html(data);
            }
        });
    })
</script>

<footer class="footer">

</footer>

</body>
</html>

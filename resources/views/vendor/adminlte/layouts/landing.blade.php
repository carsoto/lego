<!DOCTYPE html>

<!--

Landing page based on Pratt: http://blacktie.co/demo/pratt/

-->

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="LEGO - academia de beach volley en Guayaquil - Ecuador">

    <meta name="author" content="Carmen María Soto">



    <meta property="og:title" content="LEO" />

    <meta property="og:type" content="website" />

    <meta property="og:description" content="{{ env('APP_NAME') }}" />

    <meta property="og:url" content="http://legovolley.com/app/" />

    <meta property="og:image" content="" />

    <meta property="og:sitename" content="lego.volley" />

    <meta property="og:url" content="http://legovolley.com/app/" />



    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:site" content="@CarmenSotoO" />

    <meta name="twitter:creator" content="@CarmenSotoO" />



    <title>LEGO - academia de beach volley</title>

    <title>{{ env('APP_NAME') }}</title>



    <!-- Custom styles for this template -->

    <link href="{{ asset('/public/css/all-landing.css') }}" rel="stylesheet">

    <link rel="icon" href='{{ asset('/public/images/logo-lego.ico') }}' type="image/x-icon">
    <link rel="shortcut icon" href='{{ asset('/public/images/logo-lego.ico') }}' type="image/x-icon"> 

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>



</head>



<body data-spy="scroll" data-offset="0" data-target="#navigation">



<div id="app">

    <!--<div class="col-md-4" style="margin-bottom: 20px;"><a href="" class="btn btn-success">INICIAR SESIÓN</a></div>

    <div class="col-md-4" style="margin-bottom: 20px;"><a href="{{ route('registro.index') }}" class="btn btn-primary">REGISTRO</a></div>

    <div class="col-md-4" style="margin-bottom: 20px;"><a href="{{ route('registro.atleta', array('tipo' => 'niños')) }}" target="_blank" class="btn btn-md btn-flat btn-info">REGISTRO PARA NIÑOS</a></div>

    <div class="col-md-4" style="margin-bottom: 20px;"><a href="{{ route('registro.atleta', array('tipo' => 'adultos')) }}" target="_blank" class="btn btn-md btn-flat btn-primary">REGISTRO PARA ADULTOS</a></div>-->

    <div style="text-align: center;">

        <a href="{{ route('vacacional.index') }}">

            <img src="{{ asset('public/images/logo-lego.png') }}" width="180px">

        </a>

        <h3 style="font-family: Verdana;">¡Bienvenidos a nuestra academia!</h3>    

    </div>

</div>



<!-- Bootstrap core JavaScript

================================================== -->

<!-- Placed at the end of the document so the pages load faster -->

<script src="{{ asset('/public/js/app.js') }}"></script>

<script src="{{ asset('/public/js/smoothscroll.js') }}"></script>

<script>

    $('.carousel').carousel({

        interval: 3500

    })

</script>

</body>

</html>


<head>

    <meta charset="UTF-8">

    <title> {{ env('APP_NAME') }} - @yield('htmlheader_title', 'Your title here') </title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" href='{{ asset('/public/images/logo-lego.ico') }}' type="image/x-icon">
    <link rel="shortcut icon" href='{{ asset('/public/images/logo-lego.ico') }}' type="image/x-icon">

    <link href="{{ asset('/public/css/all.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/public/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



    <script>

        window.Laravel = {!! json_encode([

            'csrfToken' => csrf_token(),

        ]) !!};

    </script>

</head>


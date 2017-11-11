<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Casico - Photography') }}</title>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="/img/icon.jpg"/>
    <!-- Styles -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/header.css" rel="stylesheet">
    <link href="/css/footer.css" rel="stylesheet">
    <link href="/css/jquery-ui.min.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">

    <!-- custom settings -->
    <link rel="stylesheet" href="/css/style.css" />
    <link rel="stylesheet" href="/css/custom.css" />
    <!-- responsive -->
    <link rel="stylesheet" href="/css/custom-font.css" />

    <!-- BEGIN PLUGIN CSS -->
    <link href="/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->

    <link href="/css/login.css" rel="stylesheet" type="text/css" />

    <link href="/css/style.css" rel="stylesheet">

    <script src="/js/jquery-1.12.4.min.js"></script>   
    <script src="/js/app.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @include('includes.header')

    <div class="main-wrapper animsition">
        @yield('content')
    </div>
    
    @include('includes.footer')

    <!-- modernizr -->
    <script src="js/lib/modernizr-2.6.2.min.js"></script>
    <!-- js -->
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/scripts.js"></script>
    <!-- main js -->
    <script src="js/main.js"></script>
</body>
</html>

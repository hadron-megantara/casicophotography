<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="no-js">
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
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/css/custom-font.css" />
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/style.css" />

    @if(Auth::check())
        <link href="/css/highcharts.css" rel="stylesheet">
        <link href="/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/animate.min.css" rel="stylesheet" type="text/css" />
        <link href="/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
        <link href="/css/webarch.css" rel="stylesheet" type="text/css" />
    @else
        <link rel="stylesheet" href="/css/plugins.css">
        <link rel="stylesheet" href="/css/main.css">
    @endif

    <!-- custom settings -->
    <link rel="stylesheet" href="/css/custom.css" />
    <link rel="stylesheet" href="/css/login.css" />

    <!-- main js -->
    @if(Auth::check())
        <script src="/js/jquery-1.12.4.min.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/jquery-ui.min.js"></script>
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/jquery.priceformat.min.js"></script>
        <script src="/js/highstock.js"></script>
        <script src="/js/spin.min.js"></script>
    @else
        <script src="/js/app.js"></script>
        <script src="/js/jquery-1.12.4.min.js"></script>
        <script src="/js/jquery-ui.min.js"></script>
        <script src="/js/jquery.dataTables.min.js"></script>
        <script src="/js/modernizr-2.6.2.min.js"></script>
    @endif

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    @if(Auth::check())
        @include('includes.admin-header')
    @else
        <div class="main-wrapper animsition">

        @include('includes.header')
    @endif
    
    @yield('content')

    @if(Auth::check())
        @include('includes.admin-footer')
    @else
        @include('includes.footer')

        </div>
    @endif

    @if(Auth::check())
        <script src="/plugins/pace/pace.min.js" type="text/javascript"></script>
        <!-- BEGIN JS DEPENDECENCIES-->
        <script src="/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
        <script src="/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
        <script src="/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
        <script src="/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
        <script src="/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
        <!-- END CORE JS DEPENDECENCIES-->

        <!-- BEGIN CORE TEMPLATE JS -->
        <script src="/js/webarch.js" type="text/javascript"></script>
        <!-- END CORE TEMPLATE JS -->
    @else
        
        <script src="/js/scripts.js"></script>
        <script src="/js/main.js"></script>
    @endif
</body>
</html>

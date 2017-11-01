<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ trans('landing.title') }}</title>

    <link rel="stylesheet" href="/vendor/bootstrap-3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap-3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/style.css">

    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/vendor/bootstrap-3.3.7/js/bootstrap.min.js"></script>

@yield('additional-headers')
</head>
<body>

    <nav class="navbar navbar-default navbar-custom" id="sticky-menu">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('landing.news.getNewsItems') }}">
                    <i class="fa fa-newspaper-o"></i> {{ trans('landing.menu.newsReader') }}
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="container">
            @yield('content')
        </div>
    </div>

    <script type="text/javascript" src="/js/jquery.sticky-kit.min.js"></script>
    <script type="text/javascript" src="/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
@yield('footer-scripts')

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<header class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Hotel RS</a>
            <ul class="nav navbar-nav float-xs-right">
                <li class="nav-item">
                    <button class="navbar-toggler" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" aria-label="Toggle navigation"></button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header"> Hotel Management <i class="icon-building"></i></h6>
                        <a class="dropdown-item" href="#"><i class="icon-bed"></i> Room Types</a>
                        <a class="dropdown-item" href="#"><i class="icon-calendar-empty"></i> Calendar</a>
                        <a class="dropdown-item" href="#"><i class="icon-calendar-check"></i> Reservations</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header"> System Management <i class="icon-wrench"></i></h6>
                        <a class="dropdown-item" href="#"><i class="icon-building"></i> Hotels</a>
                        <a class="dropdown-item" href="#"><i class="icon-bed"></i> Room Types</a>
                        <a class="dropdown-item" href="#"><i class="icon-bathtub"></i> Facilities</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>

@yield('content')

<nav id="site-footer" class="navbar navbar-light bg-faded text-sm-center">
    <span>Made with ♥ by <a href="https://medium.com@dumindu">Dumindu Madunuwan</a></span>
</nav>

<script>
    @yield('globaljs')
</script>
<script src="/js/app.js"></script>

</body>
</html>
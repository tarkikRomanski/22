<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?{{ random_int(0, 100) }}">
    <link rel="stylesheet" href="/css/loader.css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <p class="col-auto logo">TwentyTwo</p>
            @if (!Auth::guest())
                <div class="float-right">
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            @endif
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="container">
        <div class="row">
            <p class="col-12 text-center"><a target="_blank" href="https://vk.com/tarkik">Tarkik</a>&copy;2017</p>
        </div>
    </div>
</footer>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js?{{ random_int(0, 100) }}"></script>
</body>
</html>

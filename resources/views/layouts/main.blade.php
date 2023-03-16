<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ url('css/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css' )}}">
    <link rel="stylesheet" href="{{ asset('css/flag-icon.css' )}}"/>
    <title>Activate</title>
</head>
<body class="d-flex flex-column min-vh-100" style="background-image: url('{{ asset('img/bg.svg')}}');">
<div class="container">
    <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('welcome') }}">Главная</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('activate.countries.index') }}">Список стран</a>
                        <a class="nav-link" href="{{ route('activate.product.index') }}">Список сервисов</a>
                        <a class="nav-link" href="{{ route('users.index') }}">Пользователи</a>
                        <a class="nav-link" href="{{ route('activate.order.index') }}">Заказы</a>
                        <a class="nav-link" href="{{ route('activate.bot.index') }}">Боты</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
</div>

<footer class="mt-auto">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        Copyright © 2023 | Сreated by:
        <a class="text-reset fw-bold" href="https://github.com/evans86">Rex</a>
        | Powered By:
        <a class="text-reset fw-bold" href="https://bot-t.com/">Bot-t.com</a>
    </div>
</footer>
</body>
</html>

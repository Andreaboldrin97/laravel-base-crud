<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>comic | @yield('name')</title>
</head>

<body>
    <header>
        @include('includes.footer')
    </header>

    <main>
        @yield('main-content')
    </main>

    <footer>
        @include('includes.footer')
    </footer>
</body>

</html>

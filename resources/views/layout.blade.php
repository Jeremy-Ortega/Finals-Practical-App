<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note App</title>
</head>
<body>

    <!-- Show user info if logged in -->
    @auth
        <p>Logged in as: {{ auth()->user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @endauth

    <hr>

    <!-- This is where each page will inject its content -->
    @yield('content')

</body>
</html>

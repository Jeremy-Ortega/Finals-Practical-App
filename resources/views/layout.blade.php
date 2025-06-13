<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Note App</title>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>
<script>
    // Add fade-in class on page load
    window.addEventListener('DOMContentLoaded', () => {
        document.body.classList.add('fade-in');
    });

    // Fade out when a link is clicked
    document.querySelectorAll('a[href]').forEach(link => {
        link.addEventListener('click', e => {
            const target = link.getAttribute('target');
            const href = link.getAttribute('href');

            // Ignore external links or new tabs
            if (
                href.startsWith('#') ||
                href.startsWith('http') ||
                target === '_blank'
            ) return;

            e.preventDefault();
            document.body.classList.remove('fade-in');
            document.body.classList.add('fade-out');

            // Wait for the fade-out to finish before navigating
            setTimeout(() => {
                window.location = href;
            }, 500); // match with CSS duration
        });
    });
</script>

    <!-- Show user info if logged in -->
    {{-- @auth
        <p>Logged in as: {{ auth()->user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Logout</button>
        </form>
    @endauth --}}

    <hr>

    <!-- This is where each page will inject its content -->
    @yield('content')

</body>
</html>

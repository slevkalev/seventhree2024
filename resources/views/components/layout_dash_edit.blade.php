<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
        }
    </style>
    <title>{{ $heading }}</title>
    <link rel="stylesheet" href="../../../style.css">
    <script src="../../../js/main.js" defer></script>
</head>
    <body>
        <div class="header">
            <a class="logo" href="http://seventhree.ca">Seventhree.ca</a>

            <div class="login-div">
                @guest

                    <x-nav-link href="/login" :active="request()->is('login')">Log in</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>

                @endguest

                @auth

                    <form method="POST" action="/logout">
                        @csrf

                        <x-form-button>Log Out</x-form-button>
                    </form>

                @endauth
            </div>
        </div>
        <main>
            <div class="user-div"></div>
            <div class="container center">
                {{ $slot }}
            </div>
        </main>

    </body>
</html>

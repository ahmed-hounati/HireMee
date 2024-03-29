<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
              integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <div>
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            @if (auth()->user()->role === 'user')
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl flex justify-between	 gap-6 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <a class="text-white text-2xl" href="{{route('user.cv')}}">
                            CV
                        </a>
                        <a class="text-white text-2xl" href="{{route('user.show')}}">
                            show
                        </a>
                        <a class="text-white text-2xl" href="{{route('user.download')}}">
                            download
                        </a>
                        <a class="text-white text-2xl" href="{{route('user.entreprises')}}">
                            Entreprises
                        </a>
                        <a class="text-white text-2xl" href="{{route('user.emplois')}}">
                            Jobs
                        </a>

                    </div>
                </header>
            @endif
                @if (auth()->user()->role === 'entreprise')
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <a class="text-white text-3xl" href="{{route('entreprise.emplois.all')}}">
                                Les offres d'emploi
                            </a>
                        </div>
                    </header>
                @endif

                @if (auth()->user()->role === 'admin')
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl flex justify-between	 gap-6 mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <a class="text-white text-3xl" href="{{route('admin.dashboard')}}">
                                statistics
                            </a>

                            <a class="text-white text-3xl" href="{{route('admin.entreprises')}}">
                                All entreprises
                            </a>

                            <a class="text-white text-3xl" href="{{route('admin.users')}}">
                                All users
                            </a>
                        </div>
                    </header>
                @endif
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>
    </body>
</html>

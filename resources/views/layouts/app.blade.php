<!DOCTYPE html>
<html class="dark bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-head/>
    </head>
    <body class="font-sans antialiased da">
        <div class="min-h-screen dark:bg-slate-900 ">
            @include('layouts.navigation')
           

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow-md dark:bg-slate-800 dark:text-white">
                    <div class=" max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 dark:bg-slate-800 dark:text-white">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
      
            <main class="dark:bg-slate-900 dark:bg-none dark:text-white">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

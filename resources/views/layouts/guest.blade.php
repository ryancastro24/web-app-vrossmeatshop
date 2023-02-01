<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <x-head/>
    </head>
    <body class="antialiased ">
        <div class="relative isolate  min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover before:content-[''] before:absolute before:w-full before:h-full before:bg-[rgba(0,0,0,0.6)] before:z-[-1]" style="background-image: url({{ asset('dist/assets/img/background.jpg') }})">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full  sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

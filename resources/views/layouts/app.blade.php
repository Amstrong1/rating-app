<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        .dataTables_wrapper .row:first-child {
            display: flex;
            justify-content: space-between;
            
        }
        .dataTables_wrapper .row:last-child {
            display: flex;
            justify-content: space-between;
            
        }

        .select2 {
            display: block;
            width: 100%;
        }

        input,
        .select2-container .select2-selection--single,
        .select2-container .select2-selection--multiple {
            height: 44px;
        }

        .select2-container .select2-selection--single,
        .select2-container .select2-selection--multiple {
            border-color: #e5e7eb;
            border-width: 2px;
            padding-top: 8px;
            margin-top: 4px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            top: 90%;
            left: 0;
        }

        .buttons-excel {
            padding-bottom: 0.625rem;
            padding-top: 0.625rem;
            padding-left: 1.25rem;
            padding-right: 1.25rem;
            background-color: rgb(4 108 78/1);
            border-radius: 0.5rem;
            color: #fff;
            font-weight: 700;
        }

        .pagination {
            display: inline-flex;
        }

        .pagination li {
            padding: 8px;
            box-sizing: border-box;
            border-width: .5px;
            border-style: solid;
            border-color: #E5E7EB;
        }
    </style>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            corePlugins: {
                preflight: false,
            },
        };
    </script>

</head>

<body class="font-sans antialiased">
    <!-- Page Heading -->
    <header class="fixed z-50 w-full bg-white text-white shadow" style="background-color: #03224c">
        @include('layouts.navigation-top')
        @include('layouts.navigation')
    </header>

    <div class="w-full min-h-screen bg-fixed bg-center bg-cover flex flex-col sm:justify-center items-center"
        style="background-image:url('assets/img/146.jpg');">

        <div class="w-full min-h-screen pt-16 md:pt-30 lg:pt-40 mb-0" style="background-color: rgba(3, 34, 76, .8)">
            <div class="">
                <!-- Page Content -->
                <main class="pb-16 md:pb-20 lg:pb-12">
                    {{ $slot }}
                </main>

                <footer class="fixed bottom-0 w-full">
                    @include('layouts.navigation-bottom')

                    @if (request()->routeIs('dashboard'))
                        <div class="text-center lg:text-left grid grid-cols-6 h-6" style="background-color: #03224c">
                            <div class=""></div>
                            <div class="col-span-4 m-2 mb-0 text-center text-white text-md bg-white font-medium"
                                style="color: #03224c">
                                <marquee behavior="" direction="">
                                    Licence accordée à l'entreprise {{ Auth::user()->structure->name }}. Validité 1an :
                                    Du {{ \Carbon\Carbon::parse(Auth::user()->structure->created_at)->format('d/m/Y') }}
                                    au
                                    {{ \Carbon\Carbon::parse(Auth::user()->structure->created_at)->addYear()->format('d/m/Y') }}
                                </marquee>
                            </div>
                            <div class=""></div>
                        </div>

                        <div class="flex justify-end font-semibold p-4 md:p-2 text-sm text-white"
                            style="background-color: #03224c">
                            Support Technique : &nbsp; <a href="tel:+22958282558"> 58 28 25 58 </a>
                        </div>
                    @endif
                </footer>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script defer src="{{ asset('js/main.js') }}"></script>

</body>

</html>

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
        .group-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }
            
            .group-title {
                margin: 0;
                font-size: 24px;
                color: #333;
            }
            
            .group-title::after {
                content: "";
                display: block;
                width: 100%;
                height: 2px;
                background-color: #1374c9;
                margin-top: 5px;
            }
            
            .group-chat {
                border: 1px solid #ddd;
                border-radius: 10px;
                padding: 20px;
                background-color: #f9f9f9;
            }
            
            .messages-container {
                height: 300px; /* Height of the messages container */
                overflow-y: auto; /* Enable vertical scrolling */
            }
            
            .message {
                display: flex;
                margin-bottom: 20px;
            }
            
            .message-avatar {
                margin-right: 10px;
            }
            
            .avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
            }
            

            
            .message-content {
                padding: 15px;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            

            .sent-message {
                background-color: #d6e8ff;
                margin-right: 8px;
            
            }
            
            .message-timestamp {
                color: #999;
                font-size: 0.8em;
            }
            
            .message-input {
                display: flex;
                align-items: center;
                margin-top: 20px;
            }
            
            .message-input textarea {
                flex: 1;
                border: none;
                background-color: #fff;
                resize: none;
                padding: 15px;
                font-size: 14px;
                border-radius: 10px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            
            .send-button {
                background-color: #1374c9;
                color: #fff;
                border: none;
                padding: 12px 20px;
                border-radius: 10px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin-left: 10px;
            }
            
            .send-button:hover {
                background-color: #1565c0;
            }
            
            .btn-primary {
                background-color: #03224C;
                color: #fff;
                border: none;
                border-radius: 10px;
                padding: 12px 20px;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
            
            .btn-primary:hover {
                background-color: #1565c0;
            }
  
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
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>

    @laravelPWA
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
                    @if (Auth::user()->structure->created_at->addYear() < now())
                        <h1 class="text-center m-4 text-white font-bold">
                            Votre licence n'est plus valide. Veuillez contacter le service client
                        </h1>
                    
                    @else
                        {{ $slot }}
                    @endif
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

                        {{-- <div class="flex justify-end font-semibold p-4 md:p-2 text-sm text-white"
                            style="background-color: #03224c">
                            Support Technique : &nbsp; <a href="tel:+22955695656"> +229 55 69 56 56</a>
                        </div> --}}
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

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/geolocation.js') }}"></script>

</head>


<body class="font-sans text-gray-900 antialiased" onload="geolocal()">

    <header>
        <!-- Navigation bar -->
        <nav class="relative flex w-full items-center justify-between bg-white text-white py-2 shadow-lg md:flex- md:justify-start"
            style="background-color: #03224c" data-te-navbar-ref>
            <div class="flex w-full flex-wrap items-center justify-between px-3">
                <div class="flex items-center justify-between w-full">
                    <!-- Hamburger menu button -->
                    <button
                        class="border-0 bg-transparent px-2 text-xl leading-none transition-shadow duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:hidden"
                        type="button" data-te-collapse-init data-te-target="#navbarSupportedContentX"
                        aria-controls="navbarSupportedContentX" aria-expanded="false" aria-label="Toggle navigation">
                        <!-- Hamburger menu icon -->
                        <span class="[&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="h-7 w-7">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </span>
                    </button>
                </div>

                <div>
                    <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl h-20"
                        href="/">
                        <img class="w-10" src="{{ url('storage/' . $user->structure->logo) }}"
                     alt=""> &nbsp;
                        <div class="tracking-widest text-sm font-semibold italic rounded text-white">
                            {{ $user->structure->name }}</div>
                    </a>
                </div>

                <!-- Navigation links -->
                <div class="hidden md:flex md:flex-row justify-end content-center">
                    <ul class="mr-auto flex flex-col md:flex-row md:justify-end" data-te-navbar-nav-ref>
                        <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                            <a class="block" href="{{ url()->previous() }}" data-te-nav-link-ref data-te-ripple-init
                                data-te-ripple-color="light">Accueil</a>
                        </li>
                        <li class="mb-2 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                            <a class="block" href="{{ $user->structure->slug ?? '#' }}" data-te-nav-link-ref data-te-ripple-init
                                data-te-ripple-color="light">A Propos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero section with background image, heading, subheading and button -->
        <div class="bg-fixed bg-cover bg-no-repeat h-96"
            style="background-position: 50%; background-image: url('assets/img/146.jpg');">
            <div class="px-8 md:px-14 mx-auto flex flex-wrap flex-col md:flex-row items-center h-full py-2"
                style="background-color: rgba(0, 0, 0, 0.50)">
            </div>
        </div>
    </header>

    <section class="text-gray-600 body-font">
        <div class="container md:px-5 py-12 mx-auto">
            <div class="p-4">
                @if (Session::has('success'))
                    <div class="mb-4 rounded-lg bg-success-100 px-6 py-5 text-base text-success-700" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <h2 class="text-center font-bold text-xl md:text-2xl my-6">Merci de nous accorder 2 min</h2>
                <form action="" id="" method="POST">
                    @csrf

                    <input type="hidden" name="quizzes" value="{{ $quizzes->count() }}">

                    @php $i = 0; @endphp
                    @foreach ($quizzes as $quiz)
                        <div class="relative mb-6 md:w-1/2 md:mx-auto">
                            <label for="{{ 'quiz' . $i }}" class="">
                                {{ $quiz->question }}
                            </label>
                            <select
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"
                                name="{{ 'answer' . $i }}" id="{{ 'quiz' . $i }}">
                                <option value="">Reponse</option>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                            <textarea name="{{ 'description' . $i }}" placeholder="Détail(Optionel)"
                                class="my-2 peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none"></textarea>
                            <x-input-error :messages="$errors->get("{{ 'answer' . $i }}")" class="mt-2" />
                        </div>
                        <input type="hidden" name="{{ 'quiz_id' . $i }}" value="{{ $quiz->id }}">

                        @php $i++; @endphp
                    @endforeach

                    <input type="hidden" name="structure" value="{{ $structure->id }}">
                    <input type="hidden" name="user" value="{{ $user->id }}">

                    <input type="hidden" id="latitude" name="latitude" value="">
                    <input type="hidden" id="longitude" name="longitude" value="">

                    <!--Submit button-->
                    <button type="submit"
                        class="md:w-1/2 block mx-auto rounded px-6 pb-2 pt-2.5 my-6 text-xs font-medium uppercase leading-normal text-white"
                        style="background-color: #4bad41">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center" style="background-color: #03224c">
        <!--Footer-->

        <div class="w-full pt-8 pb-8 text-md text-center fade-in flex flex-col md:flex-row justify-between">
            <div class="mt-2">
                <a class="text-white no-underline hover:no-underline" href="#">PCD</a> <span class="text-white"> |
                </span>
                <a class="text-white no-underline hover:no-underline" href="#">CGU</a>
            </div>

            <div class="mb-2">
                <a class="text-white no-underline hover:no-underline" href="#">&copy;{{ $user->structure->name }}&nbsp;     2023</a>
            </div>
        </div>

        <div class="my-2 flex justify-center items-center w-full">
            <a class="text-white no-underline hover:no-underline" href="#">Développer par ...</a> &nbsp; &nbsp;
            <a class="text-white no-underline hover:no-underline"> <u>Tel:</u> 01020304</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @include('sweetalert::alert')

</body>

</html>

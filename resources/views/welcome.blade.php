<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/geolocation.js') }}"></script>
    <style>
        /* Styles pour la section audio */
        .display {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 20px; /* Ajustez la hauteur selon vos besoins */
        }
    
        audio {
            width: 100%;
            max-width: 400px;
        }
    
        /* Styles pour les contrôles audio */
        .controllers {
            text-align: center;
        }
    
        button {
            padding: 10px 20px;
            background-color: #4bad41;
            color: white;
            border: none;
            cursor: pointer;
            margin: 10px;
        }
    
        button:hover {
            background-color: #357e2e;
        }
    
        button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
    
        p {
            font-size: 18px;
        }
    </style>

</head>


<body class="font-sans text-gray-900 antialiased" onload="geolocal()">

    <header>
        <!-- Navigation bar -->
        <nav class="relative flex w-full items-center justify-between bg-white text-white py-2 shadow-lg md:flex- md:justify-start"
            style="background-color: #03224c" data-te-navbar-ref>
            <div class="flex w-full flex-wrap items-center justify-between px-3">
                {{-- <div class="flex items-center justify-between w-full">
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
                </div> --}}

                <div>
                    <a class="flex items-center no-underline hover:no-underline font-bold text-2xl lg:text-4xl h-20"
                        href="/">
                        <img class="w-10" src="{{ url('storage/' . $user->structure->logo) }}" alt=""> &nbsp;
                        <div class="tracking-widest text-sm font-semibold italic rounded text-white">
                            {{ $user->structure->name }}</div>
                    </a>
                </div>

                <!-- Navigation links -->
                <div class="md:flex md:flex-row justify-end content-center">
                    <ul class="mr-auto flex flex-col md:flex-row md:justify-end" data-te-navbar-nav-ref>
                        {{-- <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                            <a class="block" href="{{ url()->previous() }}" data-te-nav-link-ref data-te-ripple-init
                                data-te-ripple-color="light">Accueil</a>
                        </li> --}}
                        <li class="mb-2 lg:mb-0 lg:pr-2 flex" data-te-nav-item-ref>

                            <a class="flex" href="{{ $user->structure->slug ?? '#' }}" data-te-nav-link-ref
                                data-te-ripple-init data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                &nbsp;A Propos
                            </a>
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
                    <input type="hidden" id="form_type" name="form_type" value="classic">

                    

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
        <!-----------------------------  vocal ---------------------------->
        <div>
            <div class="display">

            </div>
            <div class="controllers">

            </div>

            <form action="" method="POST" style="text-align: center;" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="form_type" value="audio">
                <input type="hidden" name="structure" value="{{ $structure->id }}">
                <input type="hidden" name="user" value="{{ $user->id }}">
                <input type="hidden" name="audio" id="aud"> 
                {{-- <button type="submit" id="send" style="background-color: #4bad41">Send</button> --}}

            </form>
        </div>

        
    <footer class="px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center" style="background-color: #03224c">
        <!--Footer-->

        <div class="w-full pt-8 pb-8 text-md text-center fade-in flex flex-col md:flex-row justify-between">
            <div class="mt-2">
                <a class="text-white no-underline hover:no-underline" href="#">PCD</a> <span
                    class="text-white"> |
                </span>
                <a class="text-white no-underline hover:no-underline" href="#">CGU</a>
            </div>

            <div class="mb-2">
                <a class="text-white no-underline hover:no-underline"
                    href="#">&copy;{{ $user->structure->name }}&nbsp; 2023</a>
            </div>
        </div>

        <div class="my-2 flex justify-center items-center w-full">
            <a class="text-white no-underline hover:no-underline" href="#"><i>Made by Vibecro Corp</i></a>
            &nbsp; &nbsp;
            <a class="text-white no-underline hover:no-underline"> <i> <u>Tel:</u> +229 58 28 25 58</i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @include('sweetalert::alert')

</body>
<!-- Votre code HTML existant -->
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

<script>
    // collect DOMs
    const display = document.querySelector('.display');
    const controllerWrapper = document.querySelector('.controllers');

    const State = ['Initial', 'Record', 'Download'];
    let stateIndex = 0;
    let mediaRecorder, chunks = [], audioURL = '';

    // mediaRecorder setup for audio
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        console.log('mediaDevices supported..');

        navigator.mediaDevices.getUserMedia({
            audio: true
        }).then(stream => {
            mediaRecorder = new MediaRecorder(stream);

            mediaRecorder.ondataavailable = (e) => {
                chunks.push(e.data);
            }

            mediaRecorder.onstop = () => {
                const blob = new Blob(chunks, { 'type': 'audio/ogg; codecs=opus' });
                chunks = [];
                audioURL = window.URL.createObjectURL(blob);
                document.querySelector('audio').src = audioURL;
            }
        }).catch(error => {
            console.log('Following error has occurred: ', error)
        });
    } else {
        stateIndex = '';
        application(stateIndex);
    }

    const clearDisplay = () => {
        display.textContent = '';
    }

    const clearControls = () => {
        controllerWrapper.textContent = '';
    }

    const record = () => {
        stateIndex = 1;
        mediaRecorder.start();
        application(stateIndex);
    }

    // const stopRecording = () => {
    //     stateIndex = 2;
    //     mediaRecorder.stop();
    //     application(stateIndex);
    // }

    const downloadAudio = () => {
        const downloadLink = document.createElement('a');
        downloadLink.href = audioURL;
        downloadLink.setAttribute('download', 'audio');
        downloadLink.click();
    }

    const addButton = (id, funString, text) => {
        const btn = document.createElement('button');
        btn.id = id;
        btn.setAttribute('onclick', funString);
        btn.textContent = text;
        controllerWrapper.append(btn);
    }

    const addMessage = (text) => {
        const msg = document.createElement('p');
        msg.textContent = text;
        display.append(msg);
    }

    const addAudio = () => {
        const audio = document.createElement('audio');
        audio.controls = true;
        audio.src = audioURL;
        display.append(audio);
    }

    const application = (index) => {
        switch (State[index]) {
            case 'Initial':
                clearDisplay();
                clearControls();

                addButton('record', 'record()', 'Laisser Un vocal');
                break;

            case 'Record':
                clearDisplay();
                clearControls();

                addMessage('Recording...');
                addButton('stop', 'stopRecording()', 'Stoppez le vocal');
                break

            case 'Download':
                clearControls();
                clearDisplay();

                addAudio();
                addButton('record', 'record()', 'Laisser Un vocal');
                break

            default:
                clearControls();
                clearDisplay();

                addMessage('Your browser does not support mediaDevices');
                break;
        }
    }

    function send() {
        document.getElementById("send").value = document.getElementsByTagName("audio")[0].src;
    }
    const sendAudioToController = async (audioBlob) => {
            const formData = new FormData();
            formData.append('audio', audioBlob);
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('form_type', 'audio');
            formData.append('structure', '{{ $structure->id }}');
            formData.append('user', '{{ $user->id }}');

            try {
                const response = await fetch('/api/voice/', {
                    method: 'POST',
                    body: formData,
                });

                if (response.ok) {
                    console.log('Audio téléversé avec succès.');
                } else {
                    console.error('Erreur lors du téléversement de l\'audio.');
                }
            } catch (error) {
                console.error('Erreur réseau :', error);
            }
        };

        const stopRecording = () => {
            stateIndex = 2;
            mediaRecorder.stop();

            // Après avoir arrêté l'enregistrement, envoyez l'audio au contrôleur
            mediaRecorder.onstop = () => {
                const blob = new Blob(chunks, { 'type': 'audio/ogg; codecs=opus' });
                chunks = [];
                audioURL = window.URL.createObjectURL(blob);

                sendAudioToController(blob); // Envoyer le blob audio au contrôleur
                alert("Audio envoyé avec succé");
                application(stateIndex);
            };
        }
    application(stateIndex);
</script>
</html>
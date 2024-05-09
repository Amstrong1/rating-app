<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Evaluation</h1>
                        <span class="flex items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                            Total réponses :
                            <span class="font-semibold text-slate-700 dark:text-slate-300">
                                {{ $count_answers }}
                            </span>
                        </span>
                        <span
                            class="flex items-center gap-2  text-sm font-medium text-neutral-600 dark:text-neutral-400">
                            Total réponses positives :
                            <span class="font-semibold text-green-600 dark:text-green-400">
                                {{ $count_answers_true }}
                            </span>
                        </span>
                        <span
                            class="flex items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                            Total réponses négatives :
                            <span class="font-semibold text-red-600 dark:text-red-400">
                                {{ $count_answers_false }}
                            </span>
                        </span>
                    </div>
                    <!--Tabs navigation-->
                    <ul style="background-color: #00558b"
                        class="text-white mx-auto p-4 mb-5 flex list-none flex-row flex-wrap border-b-0 justify-center pl-0"
                        role="tablist" data-te-nav-ref>
                        <li role="presentation">
                            <a href="#tabs-quiz"
                                class="my-2 mx-4 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-slate-300 hover:isolate hover:border-transparent  focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-white dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white"
                                data-te-toggle="pill" data-te-target="#tabs-quiz" data-te-nav-active role="tab"
                                aria-controls="tabs-quiz" aria-selected="true">Satisfaction Client</a>
                        </li>
                        <li role="presentation">
                            <a href="#tabs-comment"
                                class="my-2 mx-4 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-slate-300 hover:isolate hover:border-transparent  focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-white dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white"
                                data-te-toggle="pill" data-te-target="#tabs-comment" role="tab"
                                aria-controls="tabs-comment" aria-selected="false">Avis Clients</a>
                        </li>
                        <li role="presentation">
                            <a href="#tabs-audio"
                                class="my-2 mx-4 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 text-xs font-medium uppercase leading-tight text-slate-300 hover:isolate hover:border-transparent focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-white dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white"
                                data-te-toggle="pill" data-te-target="#tabs-audio" role="tab"
                                aria-controls="tabs-audio" aria-selected="false">Avis Audios</a>
                        </li>
                    </ul>

                    <!--Tabs content-->
                    <div class="mb-6">
                        {{-- <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-quiz" role="tabpanel" aria-labelledby="tabs-quiz-tab" data-te-tab-active>
                            @php
                                $d = 0;
                            @endphp
                            @foreach ($users as $user)
                                @if ($user->rates()->count() !== 0)
                                    <div class="grid grid-cols-12">
                                        <div class="col-span-12 p-4 border-2" style="border-color: #cae1f1;">
                                            <div class="my-2">
                                                {{ $user->name }} -
                                                {{ $user->place->name ?? 'Aucun poste' }}
                                            </div>
                                            <div id="{{ 'accordionExample' . $d }}">
                                                <div
                                                    class="rounded-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                                    <h2 class="mb-0" id="{{ 'headingOne' . $d }}">
                                                        <button
                                                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition"
                                                            type="button" data-te-collapse-init
                                                            data-te-target="{{ '#collapseOne' . $d }}"
                                                            data-te-collapse-collapsed aria-expanded="false"
                                                            aria-controls="{{ 'collapseOne' . $d }}">
                                                            <span class="flex items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                                Total réponses :
                                                                <span class="font-semibold text-slate-700 dark:text-slate-300">
                                                                    {{$user->rates()->count()}}
                                                                </span>
                                                            </span>
                                                            <span class="flex items-center gap-2 ml-4 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                                Total réponses positives :
                                                                <span class="font-semibold text-green-600 dark:text-green-400">
                                                                    {{$user->rates()->where('answer', '1')->count()}}
                                                                </span>
                                                            </span>
                                                            <span class="flex items-center gap-2 ml-4 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                                Total réponses négatives :
                                                                <span class="font-semibold text-red-600 dark:text-red-400">
                                                                    {{$user->rates()->where('answer', '0')->count()}}
                                                                </span>
                                                            </span>
                                                            <span
                                                                class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-6 w-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div class="mb-6">
                                                        <div id="{{ 'collapseOne' . $d }}" class="!visible hidden"
                                                            data-te-collapse-item
                                                            aria-labelledby="{{ 'headingOne' . $d }}"
                                                            data-te-parent="{{ '#accordionExample' . $d }}">
                                                            <div class="px-5 py-4">
                                                                <x-tables.default :resources="$user->rates()->orderBy('created_at', 'desc')->get()" :mattributes="$rates_attributes"
                                                                    type="evaluate" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $d++;
                                @endphp
                            @endforeach                            
                        </div> --}}

                        <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-quiz" role="tabpanel" aria-labelledby="tabs-quiz-tab" data-te-tab-active>

                            <div class="grid grid-cols-12">
                                <div class="col-span-12 p-4 border-2" style="border-color: #cae1f1;">

                                    <div id="{{ 'accordionExample' }}">
                                        <div
                                            class="rounded-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                            <h2 class="mb-0" id="{{ 'headingOne' }}">
                                                {{-- <button
                                                    class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition"
                                                    type="button" data-te-collapse-init
                                                    data-te-target="{{ '#collapseOne' }}" data-te-collapse-collapsed
                                                    aria-expanded="false" aria-controls="{{ 'collapseOne' }}"> --}}
                                                {{-- <span
                                                        class="flex items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                        Total réponses :
                                                        <span class="font-semibold text-slate-700 dark:text-slate-300">
                                                            {{ $count_answers }}
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="flex items-center gap-2 ml-4 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                        Total réponses positives :
                                                        <span class="font-semibold text-green-600 dark:text-green-400">
                                                            {{ $count_answers_true }}
                                                        </span>
                                                    </span>
                                                    <span
                                                        class="flex items-center gap-2 ml-4 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                                                        Total réponses négatives :
                                                        <span class="font-semibold text-red-600 dark:text-red-400">
                                                            {{ $count_answers_false }}
                                                        </span>
                                                    </span> --}}
                                                {{-- <span
                                                        class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="h-6 w-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </span>
                                                </button> --}}
                                            </h2>
                                            <div class="mb-6">
                                                <div class="px-5 py-4">
                                                    <x-tables.default :resources="$rates" :mattributes="$rates_attributes"
                                                        :mactions="$my_actions" type="evaluate" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-comment" role="tabpanel" aria-labelledby="tabs-comment-tab">

                            @php
                                $c = 0;
                            @endphp

                            @foreach ($users as $user)
                                @if ($user->rates()->count() !== 0)
                                    <div class="grid grid-cols-3">
                                        <div
                                            class="sm:border-r-0 border-r-0 border-b-2 border-l-0 border-t-2 sm:border-l-2 sm:border-t-0 sm:border-b-0 border-blue-700 sm:border-blue-500 sm:rounded-t-[15px] sm:rounded-b-none rounded-b-[15px] sm:col-span-1 col-span-1">
                                            <div
                                                class="flex flex-col justify-center items-center text-white p-4 border-2 sm:border-b-0 sm:border-r-2 border-r-2 border-blue-500 bg-blue-800">
                                                <span class="text-2xl font-bold my-2">
                                                    @php
                                                        $rates = $user->rates()->get();
                                                        $answerYes = 0;
                                                        $answerNo = 0;
                                                        $answers = 0;
                                                        foreach ($rates as $rate) {
                                                            $answerYes += $rate
                                                                ->answers()
                                                                ->where('answer', true)
                                                                ->count();
                                                            $answerNo += $rate
                                                                ->answers()
                                                                ->where('answer', false)
                                                                ->count();
                                                            $answers += $rate->answers()->count();
                                                        }
                                                    @endphp
                                                    @if ($answers !== 0)
                                                        {{ ($answerYes / $answers) * 10 }} / 10
                                                    @else
                                                        0
                                                    @endif
                                                </span>

                                                <div class="flex flex-row my-2">
                                                    @if ($answers !== 0)
                                                        @for ($i = 0; $i < ceil(($answerYes / $answers) * 5); $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                            </svg>
                                                        @endfor

                                                        @for ($i = 0; $i < floor(($answerNo / $answers) * 5); $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-4 h-4">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                            </svg>
                                                        @endfor
                                                    @endif

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-span-2 p-4 border-2" style="border-color: #cae1f1;">
                                            <div class="my-2">
                                                {{ $user->name }} - {{ $user->place->name ?? 'Aucun poste' }}
                                            </div>
                                            <div id="{{ 'accordionExample' . $c }}">
                                                <div
                                                    class="rounded-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                                    <h2 class="mb-0" id="{{ 'headingOne' . $c }}">
                                                        <button
                                                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition"
                                                            type="button" data-te-collapse-init
                                                            data-te-target="{{ '#collapseOne' . $c }}"
                                                            data-te-collapse-collapsed aria-expanded="false"
                                                            aria-controls="{{ 'collapseOne' . $c }}">
                                                            Voir tous les avis
                                                            <span
                                                                class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-6 w-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div class="mb-6">
                                                        <div id="{{ 'collapseOne' . $c }}" class="!visible hidden"
                                                            data-te-collapse-item
                                                            aria-labelledby="{{ 'headingOne' . $c }}"
                                                            data-te-parent="{{ '#accordionExample' . $c }}">
                                                            <div class="px-5 py-4">
                                                                <x-tables.default :mactions="$my_actions" :resources="$user
                                                                    ->appreciations()
                                                                    ->orderBy('created_at', 'desc')
                                                                    ->get()"
                                                                    :mattributes="$comment_attributes" type="evaluate" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @php
                                    $c++;
                                @endphp
                            @endforeach
                        </div>


                        <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
                            id="tabs-audio" role="tabpanel" aria-labelledby="tabs-audio-tab">
                            @php
                                $b = 0;
                            @endphp
                            @foreach ($users as $user)
                                @if ($user->voices()->count() !== 0)
                                    <div class="grid grid-cols-12">

                                        <div class="col-span-12 p-4 border-2" style="border-color: #cae1f1;">
                                            <div class="my-2">
                                                {{ $user->name }} -
                                                {{ $user->place->name ?? 'Aucun poste' }}
                                            </div>
                                            <div id="{{ 'accordionExample' . $b }}">
                                                <div
                                                    class="rounded-lg border border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
                                                    <h2 class="mb-0" id="{{ 'headingOne' . $b }}">
                                                        <button
                                                            class="group relative flex w-full items-center rounded-t-[15px] border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition"
                                                            type="button" data-te-collapse-init
                                                            data-te-target="{{ '#collapseOne' . $b }}"
                                                            data-te-collapse-collapsed aria-expanded="false"
                                                            aria-controls="{{ 'collapseOne' . $b }}">
                                                            Voir tous les commentaires audios
                                                            <span
                                                                class="ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke-width="1.5"
                                                                    stroke="currentColor" class="h-6 w-6">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </h2>
                                                    <div class="mb-6">
                                                        <div id="{{ 'collapseOne' . $b }}" class="!visible hidden"
                                                            data-te-collapse-item
                                                            aria-labelledby="{{ 'headingOne' . $b }}"
                                                            data-te-parent="{{ '#accordionExample' . $b }}">
                                                            <div class="px-5 py-4">
                                                                <x-tables.default :resources="$user
                                                                    ->voices()
                                                                    ->orderBy('created_at', 'desc')
                                                                    ->get()" :mattributes="$voices_attributes"
                                                                    type="voice" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @php
                                    $b++;
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

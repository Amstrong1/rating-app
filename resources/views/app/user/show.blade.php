<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1>Voir les informations de {{ $user->name }}</h1>

                    <section class="pt-16 flex">
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded-lg mt-8">
                                <div class="px-6">
                                    <div class="flex flex-wrap justify-center">
                                        <div class="w-full px-4 flex justify-center">
                                            <div class="h-full w-full flex flex-col justify-center">
                                                {{-- <img alt="..." src="{{ asset('assets/img/profil.jpg') }}"
                                                    class="shadow-xl rounded-full h-24 w-24 align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"> --}}
                                                <div class="mx-auto">
                                                    {{ $qrcode }}
                                                </div>

                                                <h3
                                                    class="text-xl font-semibold leading-normal text-blueGray-700 mb-2 mt-10">
                                                    {{ $user->name }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="w-full px-4 text-center mt-4">
                                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                                <div class="mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        {{-- @php
                                                            dd($user->rates);
                                                        @endphp --}}
                                                        @if ($user->rates !== null)
                                                            {{ $user->rates->count() }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                    <span class="text-sm text-blueGray-400">QUESTIONS</span>
                                                </div>
                                                <div class="mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        @if ($user->rates !== null)
                                                            {{ $user->rates->where('answer', true)->count() }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                    <span class="text-sm text-blueGray-400">OUI</span>
                                                </div>
                                                <div class="lg:mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        @if ($user->rates !== null)
                                                            {{ $user->rates->where('answer', false)->count() }}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>
                                                    <span class="text-sm text-blueGray-400">NON</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2">
                            <div class="flex flex-col items-stretch w-full overflow-hidden rounded-lg shadow-xs border">
                                <div class="w-full overflow-x-auto">
                                    <div class="flex justify-center items-center p-4 border-b table-search-container">
                                        <label for="table-search" class="sr-only">Rechercher</label>
                                        <div class="relative">
                                            <div
                                                class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                            <input type="text" id="custom-search-input"
                                                class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Rechercher dans la liste">
                                        </div>
                                    </div>
                                    <table class="w-full whitespace-no-wrap" id="datas-table-buttons"
                                        style="width: 100% !important">
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:text-gray-400">
                                                <th class="px-4 py-3 text-center ">Question</th>
                                                <th class="px-4 py-3 text-center ">Pourcentage réponses positives</th>
                                                <th class="px-4 py-3 text-center ">Pourcentage réponses négatives</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:bg-gray-800">
                                            @if (count($quizzes) > 0)
                                                @foreach ($quizzes as $quizze)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3 text-center">
                                                            {{ $quizze->question }}
                                                        </td>
                                                        <td class="px-4 py-3 text-center">
                                                            @if ($rates !== 0)
                                                                {{ ($rateYes * 100) / $rates . ' %' }}
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-3 text-center">
                                                            @if ($rates !== 0)
                                                                {{ ($rateNo * 100) / $rates . ' %' ?? '' }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap text-center text-gray-400">
                                                        Aucun Element </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

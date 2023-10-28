<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1>Voir les informations de {{ $user->name }}</h1>

                    <section class="pt-16 flex">
                        <div class="w-full md:w-1/2 px-4">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
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
                                        <div class="w-full px-4 text-center mt-10">
                                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                                <div class="mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        {{ $user->rates->count() }}
                                                    </span>
                                                    <span class="text-sm text-blueGray-400">QUESTIONS</span>
                                                </div>
                                                <div class="mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        {{ $user->rates->where('answer', true)->count() }}
                                                    </span>
                                                    <span class="text-sm text-blueGray-400">OUI</span>
                                                </div>
                                                <div class="lg:mr-4 p-3 text-center">
                                                    <span
                                                        class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                                        {{ $user->rates->where('answer', false)->count() }}
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
                            <x-tables.default :resources="$rates" :mattributes="$my_attributes" type="" />
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

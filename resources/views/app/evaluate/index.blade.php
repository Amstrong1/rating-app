<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h1 class="font-bold text-lg my-2">Evaluation</h1>
                    </div>
                    <div class="mt-4">
                        {{-- <x-tables.default :resources="$evaluates" :mattributes="$my_attributes" type="evaluate" :mactions="$my_actions" /> --}}
                        <div style="background-color: #00558b" class="text-white p-4 border border-slate-500">
                            @if ($evaluates !== null && $evaluates->count() !== 0)
                                <h2>Trier par date de publication</h2>
                            @else
                                <h2>Aucun élément à afficher</h2>
                            @endif
                        </div>
                        @foreach ($evaluates as $evaluate)
                            @if ($evaluate !== null)
                                <div class="grid grid-cols-12">
                                    <div style="background-color: #00558b; border-color: #cae1f1; border-right-color: #09beaf"
                                        class="flex flex-col justify-center items-center text-white col-span-2 p-4 border-2 border-r-4">
                                        <span class="text-2xl font-bold my-2">
                                            {{ number_format($evaluate->user->rates()->where('answer', true)->count() *(10 / $evaluate->user->rates()->count()), 0, ',', ' ') }}
                                            /
                                            {{ $evaluate->user->rates()->count() * (10 / $evaluate->user->rates()->count()) }}
                                        </span>
                                        <div class="flex flex-row my-2">
                                            @for ($i = 0;
                                                $i <
                                                ceil(
                                                    $evaluate->user->rates()->where('answer', true)->count() *
                                                        (5 / $evaluate->user->rates()->count()),
                                                );
                                                $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="orange"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            @endfor

                                            @for ($i = 0;
                                                $i <
                                                floor(
                                                    $evaluate->user->rates()->where('answer', false)->count() *
                                                        (5 / $evaluate->user->rates()->count()),
                                                );
                                                $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="my-2">
                                            {{ $evaluate->rate_date }}
                                        </span>
                                    </div>
                                    <div class="col-span-10 p-4 border-2" style="border-color: #cae1f1;">
                                        <div>
                                            {{ $evaluate->user->name }}
                                        </div>
                                        <div>
                                            {{ $evaluate->user->place->name . ' - ' . $evaluate->rate_date }}
                                        </div>
                                        {{-- <div class="italic">
                                            {{ $evaluate->description ?? 'Le client n\'a laissé aucun commentaire' }}
                                        </div> --}}
                                        <div class="mt-6">
                                            <a style="background-color: #00558b;"
                                                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                data-te-collapse-init
                                                data-te-ripple-init
                                                data-te-ripple-color="light"
                                                href="#multiCollapseExample1"
                                                role="button"
                                                aria-expanded="false"
                                                aria-controls="multiCollapseExample1"
                                                >Les Commentaires</a
                                                >
                                                {{-- <button style="background-color: #00558b;"
                                                class="inline-block rounded bg-primary ml-32 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(159,213,202,0.9),0_4px_18px_0_rgba(159,213,202,0.2)] focus:bg-primary-700 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                type="button"
                                                data-te-collapse-init
                                                data-te-target="#multiCollapseExample2"
                                                data-te-ripple-init
                                                data-te-ripple-color="light"
                                                aria-expanded="false"
                                                aria-controls="multiCollapseExample2">
                                                Les Audios
                                                </button> --}}
                                             
                                                {{-- <div class="grid gap-4 md:grid-cols-2"> --}}
                                                <div class="flex justify-between">
                                                    <div>
                                                        <div
                                                        class="multi-collapse !visible hidden rounded-lg shadow-lg"
                                                        data-te-collapse-item
                                                        id="multiCollapseExample1">
                                                        <div
                                                            class="block rounded-lg bg-white p-4 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                                            <div class="flex flex-col">
                                                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                                    <div class="overflow-hidden">
                                                                    <table class="min-w-full text-left text-sm font-light">
                                                                        <thead class="border-b font-medium dark:border-neutral-500">
                                                                        <tr>
                                                                            <th scope="col" class="px-6 py-4">Audio</th>
                                                                            <th scope="col" class="px-6 py-4">Date</th>
                                                                            
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($voices as $voice)
                                                                            @if ($voice !== null)
                                                                        <tr
                                                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                            <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                                <audio controls src="/storage/{{ $voice->file }}">
                                                                            </audio>
                                                                            </td>
                                                                            <td class="whitespace-nowrap px-6 py-4">{{ $voice->formated_date }}</td>
                                                                        
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div
                                                        class="multi-collapse !visible hidden rounded-lg shadow-lg"
                                                        data-te-collapse-item
                                                        id="multiCollapseExample1">
                                                        <div
                                                            class="block rounded-lg bg-white p-4 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                                            <div class="flex flex-col">
                                                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                                                    <div class="overflow-hidden">
                                                                    <table class="min-w-full text-left text-sm font-light">
                                                                        <thead class="border-b font-medium dark:border-neutral-500">
                                                                        <tr>
                                                                            {{-- <th scope="col" class="px-6 py-4">Audio</th> --}}
                                                                            <th scope="col" class="px-6 py-4">Commentaires</th>
                                                                            
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($descriptions[1] as $description)
                                                                            @if ($description !== null)
                                                                        <tr
                                                                            class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                                            {{-- <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                                                <audio controls src="/storage/{{ $voice->file }}">
                                                                            </audio>
                                                                            </td> --}}
                                                                            <td class="whitespace-nowrap px-6 py-4">{{ $description->description }}</td>
                                                                        
                                                                        </tr>
                                                                        @endif
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                <div>
                                                    {{-- <div
                                                    class="multi-collapse !visible hidden rounded-lg shadow-lg"
                                                    data-te-collapse-item
                                                    id="multiCollapseExample2">
                                                    <div
                                                        class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 dark:text-neutral-50">
                                                        ok
                                                    </div>
                                                    </div> --}}
                                                </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

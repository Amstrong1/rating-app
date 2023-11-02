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
                            @if ($evaluates->count() !== 0)
                            <h2>Trier par date de publication</h2>
                            @else
                            <h2>Aucun élément à afficher</h2>
                            @endif
                        </div>
                        @foreach ($evaluates as $evaluate)
                            <div class="grid grid-cols-12">
                                <div style="background-color: #00558b; border-color: #cae1f1; border-right-color: #09beaf"
                                    class="flex flex-col justify-center items-center text-white col-span-2 p-4 border-2 border-r-4">
                                    <span class="text-2xl font-bold my-2">
                                        {{ $evaluate->user->rates()->where('answer', true)->count() *(10 / $evaluate->user->rates()->count()) }}
                                        /
                                        {{ $evaluate->user->rates()->count() * (10 / $evaluate->user->rates()->count()) }}
                                    </span>
                                    <div class="flex flex-row my-2">
                                        @for ($i = 0;
    $i <
    $evaluate->user->rates()->where('answer', true)->count() *
        (5 / $evaluate->user->rates()->count());
    $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                            </svg>
                                        @endfor

                                        @for ($i = 0;
    $i <
    4 -
        $evaluate->user->rates()->where('answer', true)->count() *
            (5 / $evaluate->user->rates()->count());
    $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
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
                                    <div class="italic">
                                        {{ $evaluate->description ?? 'Le client n\'a laissé aucun commentaire' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

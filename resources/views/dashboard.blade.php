<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="md:flex justify-between">
                        <h1 class="font-semibold text-lg m-1">
                            {{ __('TABLEAU DE BORD') }}
                        </h1>
                    </div>

                    @if (Auth::user()->role === 'superadmin')
                        <!-- Cards -->
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                            <!-- Card -->
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Structures : {{ $company }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                    <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('structure.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif (Auth::user()->role === 'admin')
                        <!-- Cards -->
                        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                            <!-- Card -->
                            <div class="hidden md:block flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z" />
                                    </svg>
                                </div>
                                <div >
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Nombre de postes : {{ $place }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                    <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('place.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="hidden md:block flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Nombre d'employés : {{ $user }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                    <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('user.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="hidden md:block flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Nombre de questions : {{ $quiz }}
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    </p>
                                    <hr>
                                    <p
                                        class="inline-block align-baseline mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('quiz.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Questionnaires remplis : {{ $rate }}
                                    </p>
                                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">
                                    </p>
                                    <hr>
                                    <p
                                        class="inline-block align-baseline mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('evaluate.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Réponses positives : {{ $ratePos }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                    <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('evaluate.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                            <!-- Card -->
                            <div class="flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <div
                                    class="w-10 h-10 p-2 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        Réponses négatives : {{ $rateNeg }}
                                    </p>
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    </p>
                                    <hr>
                                    <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <a href="{{ route('evaluate.index') }}">Voir plus</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

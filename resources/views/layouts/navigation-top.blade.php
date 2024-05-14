<nav x-data="{ open: false }" class="bg-white text-white" style="background-color: #03224c">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-14" src="{{ url('storage/' . Auth::user()->structure->logo) }}"
                            alt="{{ Auth::user()->structure->name }}" loading="lazy">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 hidden md:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        class="text-white focus:text-white hover:text-white">
                        {{ Auth::user()->structure->name }}
                    </x-nav-link>
                </div>
            </div>

            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Notification Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center justify-center mx-2 p-2 rounded-md text-white">
                            <div>
                                <a class="hidden-arrow mr-4 flex items-center text-white transition duration-200 hover:text-white hover:ease-in-out focus:text-white disabled:text-black/30 motion-reduce:transition-none dark:text-white dark:hover:text-white dark:focus:text-white [&.active]:text-black/90 dark:[&.active]:text-white"
                                    href="#" id="dropdownMenuButton1" role="button" data-te-dropdown-toggle-ref
                                    aria-expanded="false">
                                    <!-- Dropdown trigger icon -->
                                    <span class="[&>svg]:w-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                        </svg>
                                    </span>
                                    <!-- Notification counter -->
                                    <span
                                        class="absolute -mt-6 ml-4 rounded-full bg-danger px-1 py-[0.15rem] text-xs font-bold leading-none text-white">
                                        {{ Auth::user()->unreadNotifications->count() }}
                                    </span>
                                </a>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @if (Auth::user()->unreadNotifications->count() !== 0)
                            <form action="{{ route('markAsRead') }}" method="post">
                                @csrf
                                <div class="flex p-4 justify-end">
                                    <button type="submit" class="border-0">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="red"
                                                class="w-4 h-4">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        @endif

                        @forelse (Auth::user()->unreadNotifications as $notification)
                            <x-dropdown-link href="{{ route('evaluate.index') }}">
                                <div class="flex">
                                    <div>
                                        <p class="text-sm">
                                            {{ $notification->data['message'] }}
                                        </p>
                                        <p class="text-xs">{{ getFormattedDate($notification->created_at) }}</p>
                                    </div>
                                </div>
                                <form id="mark-as-read-{{ $notification->id }}" action="{{ route('notifications.read', $notification->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </x-dropdown-link>
                        @empty
                            <p class="text-sm p-4 text-black">
                                Aucune notification
                            </p>
                        @endforelse
                    </x-slot>
                </x-dropdown>

                <button class="inline-flex items-center justify-center mx-2 p-2 rounded-md text-white">
                    <div>
                        <a href="{{ route('chat.index') }}">
                            <!-- Dropdown trigger icon -->
                            <span class="[&>svg]:w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </span>

                        </a>
                    </div>
                </button>

                <!-- Profile menu -->
                <div class="sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:text-white hover:text-white focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div> &nbsp;
                                <span class="hidden md:flex">
                                    {{ Auth::user()->name . ' ' . Auth::user()->firstname }}
                                </span>
                            </button>
                        </x-slot>

                        <x-slot name="content">

                            <x-dropdown-link :href="route('profile.edit')">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    &nbsp;
                                    {{ __('Profil') }}
                                </div>
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg> &nbsp;
                                        {{ __('Déconnexion') }}
                                    </div>
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </ul>
        </div>
    </div>
</nav>

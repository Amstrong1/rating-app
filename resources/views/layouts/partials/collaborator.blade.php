<ul class="flex flex-row justify-center" data-te-navbar-nav-ref>
    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="text-white flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white"
            :href="route('dashboard')" :active="request()->routeIs('dashboard')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>&nbsp;
            Accueil
        </x-nav-link>
    </li>

   
    <li class="mx-1 static" data-te-nav-item-ref>
        <x-nav-link
            class="text-white flex items-center whitespace-nowrap py-1 transition duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white"
            :href="route('chat.index')" :active="request()->routeIs('chat.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            &nbsp;
            Messagerie
        </x-nav-link>
    </li>

</ul>

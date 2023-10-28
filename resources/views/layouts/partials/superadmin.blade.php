<ul class="mr-auto flex flex-row" data-te-navbar-nav-ref>
    <li class="mx-2" data-te-nav-item-ref>
        <x-nav-link
            class="text-white block py-2 pr-2 transition duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white lg:px-2"
            :href="route('dashboard')" :active="request()->routeIs('dashboard')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>&nbsp;
            Accueil
        </x-nav-link>
    </li>

    <li class="mx-2" data-te-nav-item-ref>
        <x-nav-link
            class="text-white block py-2 pr-2 transition duration-150 ease-in-out hover:text-white focus:text-white dark:hover:text-white dark:focus:text-white lg:px-2"
            :href="route('structure.index')" :active="request()->routeIs('structure.*')" data-te-ripple-init data-te-ripple-color="light">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
            </svg>&nbsp;
            Structure
        </x-nav-link>
    </li>
</ul>

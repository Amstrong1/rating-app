<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('src/css/style.css')}}">
    <link rel="icon" href="{{ asset('src/img/favicon.png')}}">

</head>
<body class="pt-20 font-sans text-base font-normal text-gray-700 dark:bg-gray-800 dark:text-gray-300">
      <!-- ========== { HEADER }==========  -->
    <header>
      <!-- Navbar -->
      <nav x-data="{ open: false }" class="nav-top flex flex-nowrap lg:flex-start items-center z-20 fixed top-0 left-0 right-0 bg-white dark:bg-gray-800 overflow-y-auto max-h-screen lg:overflow-visible lg:max-h-full">
        <div class="container mx-auto px-4 xl:max-w-6xl ">
          <!-- mobile navigation -->
          <div class="flex flex-row justify-between py-3 lg:hidden">
            <!-- logo -->
            <a class="flex items-center py-2 ltr:mr-4 rtl:ml-4 text-xl" href="index.html">
              <span class="text-4xl font-semibold dark:text-gray-100">Avis<span class="text-blue-700">Client</span></span>
              <!-- <img class="max-w-full h-auto" src="src/img/logo.png" alt="Logo dark"> -->
            </a>

            <!-- navbar toggler -->
            <div class="ltr:right-0 rtl:left-0 flex items-center">
              <!-- Mobile menu button-->
              <button id="navbartoggle" type="button" class="inline-flex items-center justify-center text-gray-800 hover:text-gray-700 dark:text-gray-200 dark:hover:text-gray-300 focus:outline-none focus:ring-0" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                <span class="sr-only">Mobile menu</span>
                <svg x-description="Icon closed" x-state:on="Menu open" x-state:off="Menu closed" class="block h-8 w-8" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>

                <svg x-description="Icon open" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-8 w-8" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>
          </div>

          <!-- Mobile menu -->
          <div class="lg:hidden fixed w-full h-full inset-0 z-40" id="mobile-menu" x-description="Mobile menu" x-show="open" style="display: none;">
            <!-- bg open -->
            <span class="fixed bg-gray-900 bg-opacity-70 w-full h-full inset-x-0 top-0"></span>
            
            <!-- Mobile navbar -->
            <nav id="mobile-nav" class="flex flex-col ltr:right-0 rtl:left-0 w-64 fixed top-0 py-4 bg-white dark:bg-gray-800 h-full overflow-auto z-40" x-show="open" @click.away="open=false" x-description="Mobile menu" role="menu" aria-orientation="vertical" aria-labelledby="navbartoggle" 
            x-transition:enter="transform transition-transform duration-300" 
            x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full" 
            x-transition:enter-end="translate-x-0" 
            x-transition:leave="transform transition-transform duration-300" 
            x-transition:leave-start="translate-x-0" 
            x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full">
              <div class="mb-auto">
                <!--logo-->
                <div class="mh-18 text-center px-12 mb-8">
                  <a href="#" class="flex relative">
                    <span class="text-4xl font-semibold px-4 dark:text-gray-200">Avis<span class="text-blue-700">Client</span></span>
                    <!-- <img src="src/img/logo.png" class="max-w-full h-auto" alt="logo"> -->
                    <span class="absolute -bottom-4 transform ltr:translate-x-1/2 rtl:-translate-x-1/2 w-20 h-0 border-t-2 border-opacity-50 border-blue-700 mx-auto"></span>
                  </a>
                </div>

                <!--navigation-->
                <div class="mb-4">
                  <nav class="relative flex flex-wrap items-center justify-between">
                    <ul id="side-menu" class="w-full float-none flex flex-col">
                      <li class="relative">
                        <a href="#acceuil" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100">
                          <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Accueil
                          </span>
                        </a>
                      </li>
                      <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                        <a href="#solution" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100">
                          <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                           <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                         </svg>
                         Solution
                          <!-- caret -->
                        <span class="inline-block ltr:ml-2 rtl:mr-2">
                          <svg xmlns="http://www.w3.org/2000/svg" width=".8rem" height=".8rem" fill="currentColor" viewBox="0 0 512 512"><polyline points="112 184 256 328 400 184" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg>
                        </span>

                        </span>
                                <!-- dropdown menu -->
                        <ul class="block absolute left-1/2 right-auto transform -translate-x-1/2 border-t-2 border-blue-700 rounded rounded-t-none top-full z-50 py-0.5 ltr:text-left rtl:text-right bg-white dark:bg-gray-800 shadow-md" style="min-width: 12rem;display:none" x-description="Dropdown menu" x-show="open" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-01" x-transition:enter="transition duration-200" x-transition:enter-start="transform opacity-0 translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition translate-y-4" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-4">
                          <li class="relative">
                            <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="#">Avis Client</a>
                          </li>
                          <li class="relative">
                            <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="https://egeolocal-vib.tech/">GRH-AI</a>
                          </li>
                          
                        </ul>
                        </a>
                      </li>

                      <!-- dropdown with submenu-->
                      <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
                        <a id="mobiledrop-04" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="#contact" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                          <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                             Contact
                        </span>
                        
                        </a>

            
                      </li>

                      <!-- dropdown -->
                      <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @click.away="open = false">
                        <a id="mobiledrop-03" class="block py-3 px-4 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ route('login') }}" @click="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                          <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            Espace Client
                          </span>
                          
                        </a>     
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- copyright -->
              <div class="mt-5 text-center">
                <p>Copyright <a href="#">TailPro</a> - All right reserved</p>
              </div>
            </nav>
          </div><!-- End Mobile menu -->

          <!-- desktop menu -->
          <div class="hidden lg:flex lg:flex-row lg:flex-nowrap lg:items-center lg:justify-between lg:mt-0" id="desktp-menu">
            <!-- logo -->
            <a class="hidden lg:flex items-center py-2 ltr:mr-4 rtl:ml-4 text-xl" href="index.html">
              <span class="text-4xl font-semibold dark:text-gray-100">Avis<span class="text-blue-700">Client</span></span>
            </a>

            <!-- menu -->
            <ul class="flex flex-col lg:mx-auto mt-2  lg:flex-row lg:mt-0" style="margin-left: 22rem;">
              <!-- dropdown -->
              <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
               
                <a id="dropdown-mega" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="#acceuil" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                  <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    {{__('message.menu1')}}
                  </span>
                
                </a>

              </li>
              <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                <a id="dropdown-01" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="javascript:;" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                  <span class="flex items-center">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                  {{__('message.menu2')}}

                  
                  <!-- caret -->
                  <span class="inline-block ltr:ml-2 rtl:mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width=".8rem" height=".8rem" fill="currentColor" viewBox="0 0 512 512"><polyline points="112 184 256 328 400 184" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:48px"/></svg>
                  </span>
                </span>
                </a>
                <!-- dropdown menu -->
                <ul class="block absolute left-1/2 right-auto transform -translate-x-1/2 border-t-2 border-blue-700 rounded rounded-t-none top-full z-50 py-0.5 ltr:text-left rtl:text-right bg-white dark:bg-gray-800 shadow-md" style="min-width: 12rem;display:none" x-description="Dropdown menu" x-show="open" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-01" x-transition:enter="transition duration-200" x-transition:enter-start="transform opacity-0 translate-y-4" x-transition:enter-end="transform opacity-100 translate-y-0" x-transition:leave="transition translate-y-4" x-transition:leave-start="transform opacity-100 translate-y-0" x-transition:leave-end="transform opacity-0 translate-y-4">
                  <li class="relative">
                    <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="#">Avis Client</a>
                  </li>
                  <li class="relative">
                    <a class="block w-full py-2 px-6 clear-both whitespace-nowrap hover:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="https://egeolocal-vib.tech/">GRH-AI</a>
                  </li>
                  
                </ul>
              </li>

              <!-- dropdown with submenu-->
              <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                <a id="dropdown-02" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="#contact" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                  <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{__('message.menu3')}}

                </span>

                </a>
                
              </li>

              <!-- dropdown -->
              <li class="relative" x-data="{ open: false }" @keydown.escape.stop="open = false" @mouseleave="open = false">
                <a id="dropdown-01" class="group block py-3 lg:py-7 px-6 hover:text-blue-700 focus:text-blue-700 dark:hover:text-gray-100 dark:focus:text-gray-100" href="{{ route('login') }}" @mouseenter="open = !open" aria-haspopup="true" x-bind:aria-expanded="open" :class="{ 'text-blue-700 dark:text-gray-100': open }">
                  <span class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>&nbsp;&nbsp;
                  {{__('message.menu4')}}
 
                  {{-- <h3>{{__('message.welcome')}}</h3> --}}
                </span>
                </a>
              </li>
              <div class="fixed left-0 top-1/2 transform -translate-y-1/2">
                <form method="POST" action="{{ route('lang.switch') }}" class="p-1 bg-white border border-gray-400 rounded-l-lg shadow-lg">
                    @csrf
                    <div class="mb-2">
                        <label for="lang" class="block text-sm text-gray-700 font-semibold mb-1">Select Language</label>
                        <select name="lang" id="lang" class="w-32 py-1 px-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
                            <option value="en">English</option>
                            <option value="fr">Français</option>
                        </select>
                    </div>
                    <button type="submit" class="text-sm bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-2 rounded focus:outline-none focus:ring focus:border-blue-300">Change</button>
                </form>
            </div>
                
            
            </ul>
          
          </div><!-- end desktop menu -->
        </div>
      </nav><!-- End Navbar -->
    </header>
    
    <!-- end header -->

    <!-- =========={ MAIN }==========  -->
    <main id="content">
        <!-- =========={ HERO }==========  -->
        <div id="acceuil" class="relative pt-20 pb-24 md:pt-24 bg-gray-900 text-gray-100 z-0">
          <!-- particle moving animation -->
          <div class="particle">
            <div class="scroll-rotate absolute opacity-60 text-indigo-700" style="right:9%;bottom: 72%;">
              <svg class="bi bi-bounding-box-circles" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-yellow-300" style="right:12%;bottom: 30%;">
              <svg class="bi bi-bounding-box-circles" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-red-700 hidden lg:block" style="right:22%;bottom: 55%;">
              <svg class="bi bi-bounding-box-circles" width="1.5rem" height="1.5rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-red-700 hidden lg:block" style="left:40%;top: 20%;">
              <svg class="bi bi-bounding-box-circles" width="1.5rem" height="1.5rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-indigo-700" style="left:60%;bottom: 20%;">
              <svg class="bi bi-bounding-box-circles" width="1.5rem" height="1.5rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-yellow-300" style="left:20%;bottom: 60%;">
              <svg class="bi bi-bounding-box-circles" width="1.5rem" height="1.5rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-indigo-700" style="left:12%;bottom: 30%;">
              <svg class="bi bi-bounding-box-circles" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
            <div class="scroll-rotate absolute opacity-60 text-green-600" style="left:6%;bottom:75%;">
              <svg class="bi bi-bounding-box-circles" width="2rem" height="2rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.5 2h-9V1h9v1zm-10 1.5v9h-1v-9h1zm11 9v-9h1v9h-1zM3.5 14h9v1h-9v-1z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M14 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zM2 3a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4zm0 11a1 1 0 100-2 1 1 0 000 2zm0 1a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
              </svg>
            </div> 
          </div>
    
          <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row -mx-4 items-center justify-center">
              <!-- content -->
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2 xl:mr-auto z-10">
                <div class="text-center lg:ltr:text-left lg:rtl:text-right">
                  <h1 class="text-4xl leading-normal font-bold text-white capitalize mb-4"><span class="text-indigo-500" data-toggle="typed" data-options='{"strings": ["{{ __('message.header1') }}", "{{ __('message.header2') }}", "{{ __('message.header3') }} ", "{{ __('message.header4') }}"]}'></span>des retours<br> clients.</h1>
                  <p class="text-gray-100 leading-relaxed font-light text-xl mx-auto pb-2 mb-12">{{ __('message.header5') }}.</p>
                  <div class="mb-16 lg:mb-0">
                    <a class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-800 bg-gray-100 border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0 ltr:mr-6 rtl:ml-6" href="{{ route('login') }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline-block ltr:mr-1 rtl:ml-1" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512"><rect x="64" y="176" width="384" height="256" rx="28.87" ry="28.87" style="fill:none;stroke:currentColor;stroke-linejoin:round;stroke-width:32px"></rect><line x1="144" y1="80" x2="368" y2="80" style="stroke:currentColor;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><line x1="112" y1="128" x2="400" y2="128" style="stroke:currentColor;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line></svg>
                       Espace Client
                    </a>
                    <a class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-800 bg-gray-100 border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0" href="#contact">
                      <svg xmlns="http://www.w3.org/2000/svg" class="inline-block ltr:mr-1 rtl:ml-1" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512"><path d="M304,384V360c0-29,31.54-56.43,52-76,28.84-27.57,44-64.61,44-108,0-80-63.73-144-144-144A143.6,143.6,0,0,0,112,176c0,41.84,15.81,81.39,44,108,20.35,19.21,52,46.7,52,76v24" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="224" y1="480" x2="288" y2="480" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line x1="208" y1="432" x2="304" y2="432" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line x1="256" y1="384" x2="256" y2="256" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><path d="M294,240s-21.51,16-38,16-38-16-38-16" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
                       Contactez Nous
                    </a>
                  </div>
                </div>
              </div><!-- end content -->
    
              <!-- intro images -->
              <div class="flex-shrink max-w-full px-24 w-full lg:w-1/2 xl:w-5/12">
                <div class="relative md:-mt-2 mb-16" style="padding-bottom: 120%">
                  <!-- Android potrait -->
                  <figure class="absolute left-0 top-0 w-3/4">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                      <!-- Clip path image -->
                      <defs>
                        <clipPath id="svgf">
                          <rect x="50" y="16.5" width="480" height="1066"/>
                        </clipPath>
                      </defs>
                      <!-- Phone screen -->
                      <image clip-path="url(#svgf)" xlink:href="src/img-min/app/qr-landing1.jpg" height="94%" width="100%" style="transform:translateY(15px);"></image>
                      <!-- Phone cover -->
                      <image xlink:href="src/img-min/app/device/android-dark.png" height="100%" width="100%"></image>
                    </svg>
                  </figure>
    
                  <figure class="absolute right-0 w-3/4" style="top:12%">
                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                      <!-- Clip path image -->
                      <defs>
                        <clipPath id="svgf1">
                          <rect x="52" y="10" width="380" height="818"/>
                        </clipPath>
                      </defs>
                      <!-- Phone screen -->
                      <image clip-path="url(#svgf1)" xlink:href="src/img-min/app/qr-landing1.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
                      <!-- Phone cover -->
                      <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                    </svg>
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end hero -->
    
        <!-- =========={ SERVICES }==========  -->
        <div id="services" class="relative pt-20 pb-8 md:pt-24 md:pb-12 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12 lg:px-20">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">Nos domaines d'expertise</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Nous vous accompagnons de la création à la diffusion de vos enquêtes de satisfaction. <br> Et ce, dans tous les domaines pour obtenir vos clients.</p>
            </header><!-- end section header -->
    
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4 items-center justify-around">
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <div class="p-6 mx-4 mb-12 rounded-md shadow wow fadeInUp" data-wow-duration="1s">
                  <div class="flex rounded items-center ltr:pl-4 ltr:pr-1 md:ltr:pl-1 md:ltr:pr-1 rtl:pr-4 rtl:pl-1 md:rtl:pr-1 md:rtl:pl-1 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" class="inline-block text-indigo-700 ltr:mr-3 rtl:ml-3" fill="currentColor" viewBox="0 0 512 512"><path d="M344,144c-3.92,52.87-44,96-88,96s-84.15-43.12-88-96c-4-55,35-96,88-96S348,90,344,144Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"/><path d="M256,304c-87,0-175.3,48-191.64,138.6C62.39,453.52,68.57,464,80,464H432c11.44,0,17.62-10.48,15.65-21.4C431.3,352,343,304,256,304Z" style="fill:none;stroke:currentColor;stroke-miterlimit:10;stroke-width:32px"/></svg>
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">Baromatre Social</h3>
                  </div>
                  <p>Mesurez le climat social de votre entreprise et améliorez votre gestion des RH !</p>
                </div>
              </div>
    
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <div class="p-6 mx-4 mb-12 rounded-md shadow wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                  <div class="flex rounded items-center ltr:pl-4 ltr:pr-1 md:ltr:pl-1 md:ltr:pr-1 rtl:pr-4 rtl:pl-1 md:rtl:pr-1 md:rtl:pl-1 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor"  class="inline-block text-indigo-700 ltr:mr-3 rtl:ml-3" viewBox="0 0 16 16">
                      <path d="M6.192 2.78c-.458-.677-.927-1.248-1.35-1.643a2.972 2.972 0 0 0-.71-.515c-.217-.104-.56-.205-.882-.02-.367.213-.427.63-.43.896-.003.304.064.664.173 1.044.196.686.555 1.528 1.035 2.401L.752 8.22c-.277.277-.269.656-.218.918.055.283.187.593.36.903.348.627.92 1.361 1.626 2.068.707.706 1.44 1.278 2.068 1.626.31.173.62.305.903.36.262.05.64.059.918-.219l5.615-5.614c.118.257.092.512.049.939-.03.292-.067.665-.072 1.176v.123h.003a1 1 0 0 0 1.993 0H14a3.657 3.657 0 0 0-.004-.174c-.055-1.25-.7-2.738-1.86-3.494a4.3 4.3 0 0 0-.212-.434c-.348-.626-.92-1.36-1.626-2.067-.707-.707-1.441-1.279-2.068-1.627-.31-.172-.62-.304-.903-.36-.262-.05-.641-.058-.918.219l-.217.216zM4.16 1.867c.381.356.844.922 1.311 1.632l-.704.705c-.382-.727-.66-1.403-.813-1.938a3.284 3.284 0 0 1-.132-.673c.092.061.205.15.338.274zm.393 3.964c.54.853 1.108 1.568 1.608 2.034a.5.5 0 1 0 .682-.732c-.453-.422-1.017-1.136-1.564-2.027l1.088-1.088c.054.12.115.243.183.365.349.627.92 1.361 1.627 2.068.706.707 1.44 1.278 2.068 1.626a4.5 4.5 0 0 0 .365.183l-4.861 4.861a.567.567 0 0 1-.068-.01c-.137-.026-.342-.104-.608-.251-.525-.292-1.186-.8-1.846-1.46-.66-.66-1.168-1.32-1.46-1.846-.147-.265-.225-.47-.251-.607a.573.573 0 0 1-.01-.068l3.047-3.048zm2.871-1.934a2.44 2.44 0 0 1-.241-.561c.135.033.324.11.562.241.524.292 1.186.8 1.846 1.46.45.45.83.901 1.118 1.31a3.497 3.497 0 0 0-1.066.091 11.27 11.27 0 0 1-.76-.694c-.66-.66-1.167-1.322-1.459-1.847z"/>
                    </svg>
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">Retour Patients</h3>
                  </div>
                  <p>Ecoutez les retours de vos patients et améliorez-vous en continu.</p>
                </div>
              </div>
    
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <div class="p-6 mx-4 mb-12 rounded-md shadow wow fadeInUp" data-wow-duration="1s">
                  <div class="flex rounded items-center ltr:pl-4 ltr:pr-1 md:ltr:pl-1 md:ltr:pr-1 rtl:pr-4 rtl:pl-1 md:rtl:pr-1 md:rtl:pl-1 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="inline-block text-indigo-700 ltr:mr-3 rtl:ml-3" viewBox="0 0 16 16">
                      <path d="M5.5 2A3.5 3.5 0 0 0 2 5.5v5A3.5 3.5 0 0 0 5.5 14h5a3.5 3.5 0 0 0 3.5-3.5V8a.5.5 0 0 1 1 0v2.5a4.5 4.5 0 0 1-4.5 4.5h-5A4.5 4.5 0 0 1 1 10.5v-5A4.5 4.5 0 0 1 5.5 1H8a.5.5 0 0 1 0 1H5.5z"/>
                      <path d="M16 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                    </svg>
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">Avis Clientt</h3>
                  </div>
                  <p>Générez plus de chiffre d'affaires et fidélisez vos clients durablement !</p>
                </div>
              </div>
    
              <div class="flex-shrink max-w-full px-4 w-full lg:w-1/2">
                <div class="p-6 mx-4 mb-12 rounded-md shadow wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                  <div class="flex rounded items-center ltr:pl-4 ltr:pr-1 md:ltr:pl-1 md:ltr:pr-1 rtl:pr-4 rtl:pl-1 md:rtl:pr-1 md:rtl:pl-1 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="inline-block text-indigo-700 ltr:mr-3 rtl:ml-3" viewBox="0 0 16 16">
                      <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                      <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                    </svg>
                    <h3 class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">Temoignage Fournisseur</h3>
                  </div>
                  <p>Respectez vos engagements qualité.</p>
                </div>
              </div>
    
            </div>
            <!-- end row -->
          </div>
        </div><!-- End Services -->
    
        <!-- =========={ about }==========  -->
        <div id="solution" class="relative pt-12 pb-6 lg:pt-16 lg:pb-10 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-6">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">Nos Soutions</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">"Je Donne Mon Avis" n'est pas qu'une simple plateforme – c'est une révolution dans la gestion de la satisfaction et des retours des avis clients. Grâce à l'exploitation pointue de l'Intelligence Artificielle, nous déchiffrons<br> , analysons et transformons chaque feedback en opportunité. Découvrez une approche novatrice pour être toujours à l'écoute de vos clients, patients ou fournisseurs.</p>
            </header><!-- end section header -->
    
            <!-- showcase  -->
            <div class="flex flex-wrap flex-row -mx-4 mb-5">
              <div class="flex-shrink max-w-full w-full lg:w-1/2 px-4 self-center">
                <div class="px-12 lg:px-4 mb-12 lg:my-0">
                  <img src="src/img/svg/research.svg" class="max-w-full h-auto w-full" alt="landing page">
                </div>
              </div>
    
              <div class="flex-shrink max-w-full w-full lg:w-1/2 px-4 py-6">
                <!-- processs vertical -->
                <ol>
                  <li class="flex wow fadeInUp" data-wow-duration="1s">
                    <div class="relative flex-shrink-0 w-16 text-center">
                      <span class="absolute left-1/3 top-12 -bottom-8 border-l-2 border-dashed border-gray-200 dark:border-gray-700"></span>
                      <div class="w-12 h-12 mr-auto rounded-full p-2 bg-gray-100 border border-gray-200 dark:bg-gray-900 dark:bg-opacity-40 dark:border-gray-800">
                        <span class="text-indigo-700 text-xl">
                          1
                        </span>
                      </div>
                    </div>
    
                    <div class="ltr:ml-4 mb-4 lg:ltr:ml-6 rtl:mr-4 lg:rtl:mr-6">
                      <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-100">Notre logiciel vous permet de créer vos enquêtes facilement</h3>
                      <p>En quelques clics, créez toute forme d'enquête, grâce à une interface hyper-personnalisable et une douzaine de questions différentes les avis clients en toute simplicité !</p>
                    </div>
                  </li>
    
                  <li class="flex wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                    <div class="relative flex-shrink-0 w-16 text-center">
                      <span class="absolute left-1/3 top-12 -bottom-8 border-l-2 border-dashed border-gray-200 dark:border-gray-700"></span>
                      <div class="w-12 h-12 mr-auto rounded-full p-2 bg-gray-100 border border-gray-200 dark:bg-gray-900 dark:bg-opacity-40 dark:border-gray-800">
                        <span class="text-indigo-700 text-xl">
                          2
                        </span>
                      </div>
                    </div>
    
                    <div class="ltr:ml-4 mb-4 lg:ltr:ml-6 rtl:mr-4 lg:rtl:mr-6">
                      <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-100">Ainsi que de les envoyer par SMS ou par Mail</h3>
                      <p>Choisissez de lancer votre campagne par SMS, ou par mail auprès de vos clients/collaborateurs/patients.</p>
                    </div>
                  </li>
    
                  <li class="flex wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div class="relative flex-shrink-0 w-16 text-center">
                      <span class="absolute left-1/3 top-12 -bottom-8 border-l-2 border-dashed border-gray-200 dark:border-gray-700"></span>
                      <div class="w-12 h-12 mr-auto rounded-full p-2 bg-gray-100 border border-gray-200 dark:bg-gray-900 dark:bg-opacity-40 dark:border-gray-800">
                        <span class="text-indigo-700 text-xl">
                          3
                        </span>
                      </div>
                    </div>
    
                    <div class="ltr:ml-4 mb-4 lg:ltr:ml-6 rtl:mr-4 lg:rtl:mr-6">
                      <h3 class="text-xl font-semibold mb-2 text-gray-800 dark:text-gray-100">Et de partager les résultats, et de les exploiter !</h3>
                      <p>Partagez les meilleurs avis clients, ou mettez en place des actions de correction automatiquement ! Notre IA peut par exemple notifier la personne en charge du problème, pour que vous vous amélioriez rapidement !</p>
                    </div>
                  </li>
                </ol><!-- end processs vertical -->
              </div>
            </div>
    
            
          </div>
        </div>
        <!-- End about -->
    
        <!-- =========={ SCREENSHOT }==========  -->
        <div id="project" class="relative py-20 md:py-24 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12 lg:px-20">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">Exemples d'enquêtes</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Nos enquêtes sont entièrement personnalisables, pour s'adapter parfaitement à votre charte graphique !</p>
            </header><!-- end section header -->
    
            <div class="flex flex-wrap flex-row -mx-4 items-center">
              <div class="w-full lg:w-10/12 px-4 mx-auto">
                <!-- screenshot slider -->
                <div class="carousel nav-dark-button" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "prevNextButtons": true , "pageDots": false, "imagesLoaded": true }'>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf3">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf3)" xlink:href="src/img-min/app/app1.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf4">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf4)" xlink:href="src/img-min/app/app2.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf5">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf5)" xlink:href="src/img-min/app/app3.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf6">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf6)" xlink:href="src/img-min/app/app4.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                  <div class="max-w-full w-full md:w-1/2 lg:w-1/3 px-24 md:px-12 text-center">
                    <div class="slider-item">
                      <figure class="relative">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480.000000 906.000000">
                          <!-- Clip path image -->
                          <defs>
                            <clipPath id="svgf7">
                              <rect x="52" y="10" width="380" height="818"/>
                            </clipPath>
                          </defs>
    
                          <!-- Phone screen -->
                          <image clip-path="url(#svgf7)" xlink:href="src/img-min/app/app5.jpg" height="92%" width="100%" style="transform:translateY(30px);"></image>
    
                          <!-- Phone cover -->
                          <image xlink:href="src/img-min/app/device/iphone-dark.png" height="100%" width="100%"></image>
                        </svg>
                      </figure>
                    </div>
                  </div>
                </div><!-- end screenshot slider -->
              </div>
            </div>
          </div>
        </div><!-- End screenshot-->
    
        <!-- =========={ CTA }==========  -->
        <div id="cta" class="relative py-20 md:py-24 jarallax">
          <!-- background parallax -->
          <img class="jarallax-img" src="src/img-min/bg/bg3.jpg" alt="title">
    
          <!-- background overlay -->
          <div class="absolute top-0 left-0 w-full h-full opacity-90 bg-indigo-700" style="z-index:-1;"></div>
    
          <div class="container xl:max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-2xl md:text-3xl leading-normal mb-2 font-semibold text-white">Newsletter</h1>    
            <hr class="block w-12 h-0.5 mx-auto my-5 bg-gray-100 border-gray-100">  
            <p class="text-gray-100 leading-relaxed font-light text-xl mx-auto pb-2 mb-12">Inscrivez-vous à la newsletter pour ne rien manquer ! Des pépites dans votre boîte mail une fois par mois : sur la relation client, le management, le marketing…</p>
            <!-- buttom -->
            <form action="{{ route('newsletter.save') }}" method="POST">
              @csrf
              @method('post')
            
              <input type="email" class="w-full leading-5 mb-6 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="email" placeholder="Email address" name="email"  aria-label="newsletter form">
               
              <button type="submit" class="py-3 px-5 -ml-1 rounded-md leading-5 text-gray-800 bg-gray-100 border border-gray-100 hover:text-gray-900 hover:bg-gray-200 hover:ring-0 hover:border-gray-200 focus:bg-gray-200 focus:border-gray-200 focus:outline-none focus:ring-0" >
                Let's talk!
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block mr-1 transform rotate-45" width="1.5rem" height="1.5rem" fill="currentColor" viewBox="0 0 512 512"><path d="M53.12,199.94l400-151.39a8,8,0,0,1,10.33,10.33l-151.39,400a8,8,0,0,1-15-.34L229.66,292.45a16,16,0,0,0-10.11-10.11L53.46,215A8,8,0,0,1,53.12,199.94Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="460" y1="52" x2="227" y2="285" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
              </button>
            </form>
          </div>
        </div><!-- End CTA -->
    
        <!-- =========={ REVIEWS }==========  -->
        <div id="reviews" class="relative py-16 md:py-24 bg-gray-50 dark:bg-gray-900 dark:bg-opacity-20">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12">
              <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100"><span class="font-light">Ils nous </span> recommandent !</h2>
              <hr class="block w-12 h-0.5 mx-auto my-5 bg-indigo-700 border-indigo-700">
              <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">What customers say about the services we provide them.</p>
            </header><!-- end section header -->
    
            <!-- row -->
            <div class="flex flex-wrap flex-row -mx-4 justify-center">
              <div class="max-w-full px-4 w-11/12 md:w-full">
                <!-- review slider -->
                <div class="nav-dark-button" data-flickity='{ "cellAlign": "left", "wrapAround": true, "adaptiveHeight": true, "pageDots": false }'>
                  <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img1-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Rafael Ezo</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO One Company</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Tailpro have developed some fantastic service. They support our brand, reduce production time of written work and look great.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
    
                  <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img2-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Jessica Ramos</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO One Company</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Great team to work with, very approachable and are able to answer any questions we may have regarding project work.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
    
                   <!-- item -->
                  <div class="flex-shrink max-w-full px-4 w-full md:w-1/2 lg:px-12">
                    <!-- Reviews -->
                    <div class="mb-12 md:mb-2">
                      <div class="w-full text-center">
                        <div class="relative -mb-6 z-10">
                          <img class="w-14 h-14 bg-white border border-gray-200 dark:bg-gray-800 dark:border-gray-700 rounded-full mx-auto" src="src/img-min/avatar/img3-small.jpg" alt="Image description">
                        </div>
                      </div>
                      <div class="relative p-10 bg-white dark:bg-gray-800 shadow text-center rounded pt-12">
                        <p class="mb-0">
                          <span class="text-base font-semibold">Demian Berbaza</span>
                        </p>
                        <p class="mb-0"><span class="text-sm text-gray-500 ml-2">CEO One Company</span></p>
                        <blockquote>
                          <ul class="flex my-2 mx-auto justify-center">
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                            <li class="mr-3 text-yellow-300">
                              <!-- icon -->
                              <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill="currentColor" viewBox='0 0 512 512'><path class="rating-svg" d='M394,480a16,16,0,0,1-9.39-3L256,383.76,127.39,477a16,16,0,0,1-24.55-18.08L153,310.35,23,221.2A16,16,0,0,1,32,192H192.38l48.4-148.95a16,16,0,0,1,30.44,0l48.4,149H480a16,16,0,0,1,9.05,29.2L359,310.35l50.13,148.53A16,16,0,0,1,394,480Z'/></svg>
                              <!-- <i class="fa fa-star"></i> -->
                            </li>
                          </ul>
                          <p class="text-gray-500">Thank you so much for your work on the Logo design and Web development. They really helped us get to where we needed.</p>
                        </blockquote>
                      </div>
                    </div><!-- End Reviews -->
                  </div>
                </div><!-- end review slider -->
              </div>
            </div><!-- end row -->
          </div>
        </div><!-- End Reviews -->

        <!-- contact start -->
        <div id="contact" class="relative py-20 md:py-24 bg-white dark:bg-gray-800">
          <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap flex-row -mx-4 justify-center">
              <div class="max-w-ful px-4 w-full lg:w-8/12">
                <div class="bg-gray-50 border border-gray-200 dark:bg-gray-900 dark:bg-opacity-20 dark:border-gray-800 rounded-md w-full p-12">
                  <!-- section header -->
                  <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-2xl md:text-3xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100"><span class="font-light">Nous </span> écrire</h2>
                    <hr class="block w-12 h-0.5 mx-auto my-5 bg-blue-700 border-blue-700">
                    <p class="text-gray-600 leading-relaxed font-light text-xl mx-auto pb-2">Avez-vous des questions sur le service, veuillez nous contacter.</p>
                  </header><!-- end section header -->

                  <!-- contact form -->
                  <form action="{{ route('save.contact') }}" method="POST">
                    @csrf
                    @method('post')
                    <div class="flex flex-wrap flex-row -mx-4">
                      <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                        <label class="inline-block mb-2" for="name">Your Name</label>
                        <input type="text" name="name" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" id="name">
                        <div class="validate"></div>
                      </div>
                      <div class="flex-shrink w-full max-w-full md:w-1/2 px-4 mb-6">
                        <label class="inline-block mb-2" for="email">Your Email</label>
                        <input type="email" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="email" id="email">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="mb-6">
                      <label class="inline-block mb-2" for="subject">Subject</label>
                      <input type="text" class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="subject" id="subject">
                      <div class="validate"></div>
                    </div>
                    <div class="mb-6">
                      <label class="inline-block mb-2" for="messages">Message</label>
                      <textarea class="w-full leading-5 relative py-3 px-5 rounded text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="message" rows="10" id="messages"></textarea>
                      <div class="validate"></div>
                    </div>
                    <div class="text-center mb-6">
                      <button class="py-3 px-5 inline-block text-center rounded-md leading-normal text-gray-100 bg-blue-700 border border-blue-700 hover:text-white hover:bg-blue-800 hover:ring-0 hover:border-blue-800 focus:bg-blue-800 focus:border-blue-800 focus:outline-none focus:ring-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5rem" height="1.5rem" fill="currentColor" class="ltr:mr-2 rtl:ml-2 tranform ltr:rotate-0 rtl:-rotate-90 inline-block" viewBox="0 0 512 512"><path d="M53.12,199.94l400-151.39a8,8,0,0,1,10.33,10.33l-151.39,400a8,8,0,0,1-15-.34L229.66,292.45a16,16,0,0,0-10.11-10.11L53.46,215A8,8,0,0,1,53.12,199.94Z" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path><line x1="460" y1="52" x2="227" y2="285" style="fill:none;stroke:currentColor;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line></svg>
                        Send Message
                      </button>
                    </div>
                  </form><!-- end contact form -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End contact -->

        <!-- Footer start -->
        <footer class="bg-gray-900 text-gray-300">
          <!-- footer content -->
          <div id="footer-content" class="relative">
            <div class="container xl:max-w-6xl mx-auto px-4 py-8 border-t border-gray-200 border-opacity-10">
              <!-- row -->
              <div class="flex flex-wrap flex-row -mx-4">
                <!-- copyright text -->
                <div class="flex-shrink max-w-full px-4 w-full md:w-2/3 text-center md:ltr:text-left md:rtl:text-right mb-6 md:mb-0">
                  <p>© Made by Vibecro Corporation | Tout droit réservé</p>
                </div>

                <!-- social icon -->
                <div class="flex-shrink max-w-full px-4 w-full md:w-1/3 self-center">
                  <ul class="space-x-3 text-center md:ltr:text-right md:rtl:text-left">
                    PCD | CGU
                  </ul>
                </div>
              </div><!-- end row -->
            </div>
          </div>
        </footer>
        <!-- end footer -->
      </main>
      <!-- end main -->
        

    <!-- Start development js -->
  <!-- alpine js -->
  <script src="{{ asset('src/plugins/alpinejs/dist/cdn.min.js')}}"></script>
  <!-- plugins js -->
  <script src="{{ asset('src/plugins/jarallax/dist/jarallax.min.js')}}"></script>
  <script src="{{ asset('src/plugins/lightgallery.js/dist/js/lightgallery.min.js')}}"></script>
  <script src="src/plugins/lightgallery.js/demo/js/lg-thumbnail.min.js"></script>
  <script src="{{ asset('src/plugins/lightgallery.js/demo/js/lg-video.js')}}"></script>
  <script src="{{ asset('src/plugins/flickity/dist/flickity.pkgd.min.js')}}"></script>
  <script src="src/plugins/typed.js/lib/typed.min.js"></script>
  <script src="{{ asset('src/plugins/vanilla-lazyload/dist/lazyload.min.js')}}"></script>
  <script src="{{ asset('src/plugins/hc-sticky/dist/hc-sticky.js')}}"></script>
  <script src="{{ asset('src/plugins/wow.js/dist/wow.min.js')}}"></script>
  <!-- theme js -->
  <script src="{{ asset('src/js/theme.js')}}"></script>
  <!-- End development js -->
</body>
</html>
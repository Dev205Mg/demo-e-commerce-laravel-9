<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="/images/icone.png" type="image/x-icon">
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="bg-white">
    <!-- Header Navbar -->
        <nav class="fixed top-0 left-0 z-20 w-full border-b border-gray-200 bg-white py-2.5 px-6 sm:px-4">
            <div class="container mx-auto flex max-w-6xl flex-wrap items-center justify-between">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="block h-9 w-auto fill-current text-gray-800" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 h-6 text-blue-500 sm:h-9">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
                <span class="self-center whitespace-nowrap text-gray-700 text-xl font-semibold">FindayNaka</span>
            </span>
            <div class="mt-2 sm:mt-0 sm:flex md:order-2">
                @guest
                    <a href="{{ route('login') }}" type="button" class="rounde mr-3 hidden border border-blue-700 py-1.5 px-6 text-center text-sm font-medium text-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 md:inline-block rounded-lg">Se connecter</a>
                    <a href="{{ route('register') }}" type="button" class="rounde mr-3 hidden bg-blue-700 py-1.5 px-6 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 md:mr-0 md:inline-block rounded-lg">Créer un compte</a>
                    <!-- Register Button -->
                    <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden" aria-controls="navbar-sticky" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                @endguest
                <!-- Login Button -->
            </div>
            
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                <ul class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:text-sm md:font-medium">
                    @auth
                        <li>
                            {{-- <a href="{{ route('dashboard') }}" class="block rounded py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-100 md:p-0 md:hover:bg-transparent md:hover:text-blue-700">Dashboard</a> --}}
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        
        
        <!-- Title -->
        <div class="pt-32  bg-white">
        <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight">Liste des Produits</h1>
        </div>        
        <!-- Product List -->
        <section class="py-10 bg-gray-100">
            <div class="mx-auto grid max-w-6xl  grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <a href="#">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="https://i.imgur.com/GIeyjWd.jpg" alt="Hotel Photo" />
                </div>
        
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700">Adobe Photoshop CC 2022</h2>
                    <p class="mt-1 text-sm text-slate-400">Lisbon, Portugal</p>
        
                    <div class="mt-3 flex items-end justify-between">
                    <p>
                        <span class="text-lg font-bold text-blue-500">$850</span>
                    </p>
        
                    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
        
                        <button class="text-sm">Add to cart</button>
                    </div>
                    </div>
                </div>
                </a>
            </article>
            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <a href="#">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="https://i.imgur.com/YQqWQwj.jpg" alt="Hotel Photo" />
                </div>
        
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700">The Hilton Hotel</h2>
                    <p class="mt-1 text-sm text-slate-400">Lisbon, Portugal</p>
        
                    <div class="mt-3 flex items-end justify-between">
                    <p>
                        <span class="text-lg font-bold text-blue-500">$850</span>
                    </p>
        
                    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
        
                        <button class="text-sm">Add to cart</button>
                    </div>
                    </div>
                </div>
                </a>
            </article>
        
            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <a href="#">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Hotel Photo" />
                </div>
        
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700">The Hilton Hotel</h2>
                    <p class="mt-1 text-sm text-slate-400">Lisbon, Portugal</p>
        
                    <div class="mt-3 flex items-end justify-between">
                    <p>
                        <span class="text-lg font-bold text-blue-500">$450</span>
                    </p>
        
                    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
        
                        <button class="text-sm">Add to cart</button>
                    </div>
                    </div>
                </div>
                </a>
            </article>
        
            <article class="rounded-xl bg-white p-3 shadow-lg hover:shadow-xl hover:transform hover:scale-105 duration-300 ">
                <a href="#">
                <div class="relative flex items-end overflow-hidden rounded-xl">
                    <img src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="Hotel Photo" />
                </div>
        
                <div class="mt-1 p-2">
                    <h2 class="text-slate-700">The Hilton Hotel</h2>
                    <p class="mt-1 text-sm text-slate-400">Lisbon, Portugal</p>
        
                    <div class="mt-3 flex items-end justify-between">
                    <p>
                        <span class="text-lg font-bold text-blue-500">$450</span>
                    </p>
        
                    <div class="flex items-center space-x-1.5 rounded-lg bg-blue-500 px-4 py-1.5 text-white duration-100 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
        
                        <button class="text-sm">Add to cart</button>
                    </div>
                    </div>
                </div>
                </a>
            </article>
        </section>
        
        <!-- Footer -->
    </body>
</html>

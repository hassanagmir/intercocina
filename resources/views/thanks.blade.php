@extends('layouts.base')

@section('content')

<div class="relative z-10 mx-auto px-6 pt-28 md:max-w-2xl lg:max-w-5xl lg:px-12">
    <div class="mx-auto text-center lg:w-4/5">
        <div class="">
            <h1 class="text-5xl font-black text-blue-950 dark:text-white sm:text-6xl">
                <span class="hidden sm:inline-block">Easy to customize</span> <br class="hidden sm:inline-block">
                Modern Tailwindcss<br>
                <div class="mx-auto block w-max">
                    <div class="relative block pb-2">
                        <span class="absolute inset-0 z-[1] block bg-gradient-to-b from-blue-950 via-blue-950 to-transparent bg-clip-text text-transparent dark:from-white dark:via-white">Templates</span>
                        <span class="absolute inset-0 block bg-gradient-to-l from-[#00FFF0] to-[#00A3FF] bg-clip-text text-transparent">Templates</span>
                        <span class="block">Templates</span>
                    </div>
                    <div class="-mt-4 grow overflow-hidden">
                        <svg class="w-60 sm:w-80" height="22" viewBox="0 0 283 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.24715 19.3744C72.4051 10.3594 228.122 -4.71194 281.724 7.12332" stroke="url(#paint0_linear_18_19)" stroke-width="4"></path>
                            <defs>
                                <linearGradient id="paint0_linear_18_19" x1="282" y1="5.49999" x2="40" y2="13" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#00FFF0"></stop>
                                    <stop offset="1" stop-color="#00A3FF"></stop>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </h1>
            <p class="relative z-[11] my-8 text-lg text-gray-700 dark:text-gray-100">High Page Speed - Accessible - Fully Responsive</p>
            <div class="flex items-center justify-center gap-6">
                <a href="/templates" class="relative flex h-9 items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                    <span class="leading-none relative text-base tracking-wider text-white">Browse</span>
                </a>
                <a href="/affiliates" class="group flex items-center gap-1 tracking-wide text-primary dark:text-primaryLight">
                    <span class="duration-300 group-hover:tracking-wider group-hover:underline group-hover:underline-offset-2">Affiliates</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 translate-y-px duration-300 group-hover:translate-x-1">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
    
@endsection
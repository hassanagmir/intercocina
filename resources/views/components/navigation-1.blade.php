<div x-data="{ mobileMenu: false, dropdownOpen: false }">
    <!-- Top Bar -->
    <div class="bg-teal-500 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-10">
                <!-- Left side -->
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">BLOG</a>
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">GUIDES</a>
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">PROMOTIONS</a>
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">ABOUT US</a>
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">CONTACT</a>
                    <a href="#" class="text-sm hover:text-teal-200 transition-colors duration-200">REQUEST A QUOTE</a>
                </div>

                <!-- Right side -->
                <div class="flex items-center space-x-6">
                    <span class="text-sm font-medium">0802 08 08 08</span>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm">EN</span>
                        <div class="flex space-x-3">
                            <a href="#" class="hover:text-teal-200 transition-colors duration-200 scale-animation">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12c0-5.523-4.477-10-10-10z"/>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-teal-200 transition-colors duration-200 scale-animation">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-teal-200 transition-colors duration-200 scale-animation">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="#" class="flex items-center">
                        <span class="text-2xl font-bold text-teal-500">nindo</span>
                        <span class="text-2xl font-bold text-gray-700">host</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex lg:items-center lg:space-x-8">
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">
                            DOMAIN NAME
                        </a>
                        <!-- Dropdown -->
                        <div x-show="open" x-cloak class="absolute top-full left-0 w-48 bg-white shadow-lg rounded-md py-2 mt-2 dropdown-animation">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-500">Register Domain</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-500">Transfer Domain</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-teal-50 hover:text-teal-500">Domain Pricing</a>
                        </div>
                    </div>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">WEB HOSTING</a>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">CLOUD MOROCCO</a>
                    <div class="relative">
                        <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">
                            WORDPRESS
                            <span class="absolute -top-2 -right-6 bg-purple-600 text-white text-xs px-2 py-0.5 rounded-full animate-pulse">NEW</span>
                        </a>
                    </div>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">EMAIL</a>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">SERVERS</a>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">MANAGED SERVICES</a>
                    <a href="#" class="text-gray-700 hover:text-teal-500 transition-colors duration-200 font-medium">SSL</a>
                </div>

                <!-- Right Icons -->
                <div class="hidden lg:flex items-center space-x-6">
                    <button class="text-gray-700 hover:text-teal-500 transition-colors duration-200 scale-animation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </button>
                    <button class="text-gray-700 hover:text-teal-500 transition-colors duration-200 relative scale-animation group">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-teal-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full group-hover:bg-teal-600 transition-colors duration-200">0</span>
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="lg:hidden">
                    <button @click="mobileMenu = !mobileMenu" class="text-gray-700 hover:text-teal-500 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileMenu" x-cloak class="lg:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">DOMAIN NAME</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">WEB HOSTING</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">CLOUD MOROCCO</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">
                    WORDPRESS
                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-600 text-white">NEW</span>
                </a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">EMAIL</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">SERVERS</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">MANAGED SERVICES</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-teal-500 hover:bg-teal-50 transition-colors duration-200">SSL</a>
            </div>
        </div>
    </nav>
</div>
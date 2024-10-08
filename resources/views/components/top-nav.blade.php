<nav class="bg-red-400 hidden text-white p-2 md:flex justify-between items-center">
    

    <ul class="flex items-center gap-4">
        <li>
            <a href="{{ route('about') }}" aria-label="Linkedin page link">
                {{ __("À propos") }}
            </a>
        </li>
        <li>
            <a href="{{ route('event.list') }}" aria-label="facebook page link">
                {{ __("Événements") }}
            </a>
        </li>
        <li>
            <a href="{{ route('contact') }}" aria-label="Instagram page link">
                {{ __("Contactez-nous") }}
            </a>
        </li>
    </ul>
    <div class="flex items-center space-x-4">
        <div class="flex justify-center items-center gap-2">
            <span>
                <svg class="mt-[-2px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="m2.357 7.714l6.98 4.654c.963.641 1.444.962 1.964 1.087a3 3 0 0 0 1.398 0c.52-.125 1.001-.446 1.963-1.087l6.98-4.654M7.158 19.5h9.686c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.31-1.311c.328-.642.328-1.482.328-3.162V9.3c0-1.68 0-2.52-.327-3.162a3 3 0 0 0-1.311-1.311c-.642-.327-1.482-.327-3.162-.327H7.157c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.31 1.311c-.328.642-.328 1.482-.328 3.162v5.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311c.642.327 1.482.327 3.162.327" />
                </svg>
            </span>
            <span class="transition-colors duration-200 text-sm">Contact@intercocina.com</span>
        </div>
        <span class="mx-2">|</span>
        <div class="flex justify-center items-center gap-2">
            <span>
                <svg class="mt-[-2px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.214-5.669c-1.267-.73-3.008-2.17-4.342-.767" />
                </svg>
            </span>
            <span class="transition-colors text-sm duration-200">+212 6 61 54 79 00 </span>
        </div>
        <span class="mx-2">|</span>
        <div class="flex justify-center items-center gap-2">
            <span>
                <svg class="mt-[-2px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.214-5.669c-1.267-.73-3.008-2.17-4.342-.767" />
                </svg>
            </span>
            <span class="transition-colors text-sm duration-200">+212 5 36 35 88 88</span>
        </div>
    </div>
</nav>
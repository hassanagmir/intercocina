<div 
    x-data="{ 
        isOpen: false, 
        openedWithKeyboard: false, 
        leaveTimeout: null 
    }" 
    @mouseleave.prevent="
        leaveTimeout = setTimeout(() => { 
            isOpen = false; 
            openedWithKeyboard = false; 
        }, 250)
    " 
    @mouseenter="leaveTimeout ? clearTimeout(leaveTimeout) : true" 
    class="relative group"
    >
    <!-- Dropdown Trigger -->
    <a  href="{{ route('products') }}"
        @click.stop="isOpen = !isOpen"
        @mouseover="isOpen = true"
        @keydown.space.prevent="openedWithKeyboard = true"
        @keydown.enter.prevent="openedWithKeyboard = true"
        @keydown.escape="isOpen = false, openedWithKeyboard = false"
        :aria-expanded="isOpen || openedWithKeyboard"
        aria-haspopup="true"
        class="
            flex items-center gap-2 
            text-neutral-600 hover:text-neutral-900 
            transition-colors duration-200 
            focus:outline-none focus:ring-2 focus:ring-accent-red/50
            py-2 px-3 rounded-md
        "
    >
        {{ __("Produits") }}
        <svg 
            aria-hidden="true" 
            fill="none" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 24 24" 
            stroke-width="2" 
            stroke="currentColor" 
            class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
            :class="{ 'rotate-180': isOpen }"
        >
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
        </svg>
    </a>

    <!-- Dropdown Menu -->
    <div 
        x-cloak 
        x-show="isOpen || openedWithKeyboard" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.outside="isOpen = false, openedWithKeyboard = false"
        @keydown.escape="isOpen = false, openedWithKeyboard = false"
        @keydown.down.prevent="$focus.wrap().next()"
        @keydown.up.prevent="$focus.wrap().previous()"
        class="
            absolute z-50 top-full left-0 
            min-w-[12rem] 
            bg-white 
            rounded-lg 
            shadow-lg 
            border border-neutral-200 
            overflow-hidden 
            mt-2
        "
        role="menu"
    >
        <div class="py-1">
            <a 
                href="/category/caissons?type=caisson-bas" 
                class="
                    block px-4 py-2 
                    text-sm text-neutral-700 
                    hover:bg-neutral-100 
                    focus:bg-neutral-100 
                    focus:outline-none 
                    transition-colors 
                    duration-150
                "
                role="menuitem"
                tabindex="0"
            >
                Caissons de cuisine
            </a>
            <a 
                href="/category/facade" 
                class="
                    block px-4 py-2 
                    text-sm text-neutral-700 
                    hover:bg-neutral-100 
                    focus:bg-neutral-100 
                    focus:outline-none 
                    transition-colors 
                    duration-150
                "
                role="menuitem"
                tabindex="0"
            >
                Façades et Portes
            </a>
            <a 
                href="/category/parquettes" 
                class="
                    block px-4 py-2 
                    text-sm text-neutral-700 
                    hover:bg-neutral-100 
                    focus:bg-neutral-100 
                    focus:outline-none 
                    transition-colors 
                    duration-150
                "
                role="menuitem"
                tabindex="0"
            >
                Parquet et sols
            </a>
            <a 
                href="/category/accessoiriser" 
                class="
                    block px-4 py-2 
                    text-sm text-neutral-700 
                    hover:bg-neutral-100 
                    focus:bg-neutral-100 
                    focus:outline-none 
                    transition-colors 
                    duration-150
                "
                role="menuitem"
                tabindex="0"
            >
                Accessoires de cuisine
            </a>
        </div>
    </div>
</div>
<div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($categories as $category)
        <div class="rounded-xl bg-white shadow-sm">
            <a class="relative flex h-60 overflow-hidden rounded-t-xl bg-gray-200" href="{{ route('category.show', $category->slug) }}">
            @if ($category->image)
                <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" src="{{ url(config('app.storage'), $category->image) }}" alt="{{ $category->name }}" />
            @else
                <img class="sm:object-cover object-contain w-full h-full bg-gray-200 border-2 overflow-hidden rounded-xl" width="auto" height="auto" src="/assets/imgs/placeholder-image.webp" alt="{{ $category->name }}" />
            @endif
            </a>
            <div class="mt-4 pb-5 px-2">
                <a href="{{ route('category.show', $category->slug) }}">
                    <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $category->name }}</h3>
                </a>
                <div class="mt-2 mb-3 flex items-center justify-between">
                    <p class="w-full">
                        <span class="text-sm text-slate-900">{{ $category->description }}</span>
                    </p>
                </div>
                <div class="mt-auto">
                    <a href="{{ route('category.show', $category->slug) }}" class="inline-flex items-center text-sm font-medium text-primary-600 transition-colors hover:text-primary-700">
                        {{ __("Explorer la catégorie") }}
                        <svg class="ml-1 h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($categories as $category)
        <div class="rounded-xl">
            <a class="relative flex h-60 overflow-hidden rounded-xl bg-gray-300" href="{{ route('category.show', $category->slug) }}">
            @if ($category->image)
             <img class="sm:object-cover object-contain w-full h-full" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" />
            @else
                <div class="w-full h-full bg-gray-300">

                </div>
            @endif
            </a>
            <div class="mt-4 pb-5 ">
            <a href="{{ route('category.show', $category->slug) }}">
                <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $category->name }}</h3>
            </a>
            <div class="mt-2 mb-5 flex items-center justify-between">
                <p class="w-full">
                    <span class="text-sm text-slate-900">{{ $category->description }}</span>
                </p>
            </div>
            </div>
        </div>
    @endforeach
</div>
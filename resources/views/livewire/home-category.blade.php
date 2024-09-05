<div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($categories as $category)
        <div class="rounded-xl">
            <a class="relative flex h-60 overflow-hidden rounded-xl bg-gray-300" href="{{ route('category.show', $category->slug) }}">
            <img class="object-cover w-full h-full" src="{{ Storage::url($category->image) }}" alt="product image" />
            </a>
            <div class="mt-4 pb-5 ">
            <a href="{{ route('category.show', $category->slug) }}">
                <h5 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $category->name }}</h5>
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
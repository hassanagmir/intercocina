<div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
    @foreach ($categories as $category)
        <div class="rounded-xl bg-white border-2 shadow-sm">
            <a class="relative flex h-60 overflow-hidden rounded-t-xl bg-gray-200" href="{{ route('category.show', $category->slug) }}">
            @if ($category->image)
            {{-- {!! ImageHelper::responsive_image(Storage::url($category->image), 'My Responsive Image', 800, 600, '(max-width: 480px) 100vw, (max-width: 768px) 50vw, (min-width: 769px) 33vw') !!} --}}
            {{-- @responsiveImage(Storage::url($category->image), 'My Responsive Image', 800, 600, '(max-width: 480px) 100vw, (max-width: 768px) 50vw, (min-width: 769px) 33vw') --}}
              <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" />
            @else
                <img class="sm:object-cover object-contain w-full h-full bg-gray-200 border-2 overflow-hidden rounded-xl" width="auto" height="auto" src="/assets/imgs/placeholder-image.webp" alt="{{ $category->name }}" />
            @endif
            </a>
            <div class="mt-4 pb-5 px-2">
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
{{-- 
    <div class="rounded-xl bg-white border-2 shadow-sm">
        <a class="relative flex h-60 overflow-hidden rounded-t-xl bg-gray-200" href="#">
            <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" src="/placard.png" alt="Placards" />
        </a>
        <div class="mt-4 pb-5 px-2">
        <a href="">
            <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">Placards</h3>
        </a>
        <div class="mt-2 mb-5 flex items-center justify-between">
            <p class="w-full">
                <span class="text-sm text-slate-900">
                    Placards sur commande à partir de matériaux de haute qualité,
                     conçus pour répondre spécifiquement à vos besoins.
                </span>
            </p>
        </div>
        </div>
    </div> --}}
</div>
<div class="rounded-xl border border-gray-200 bg-white shadow-sm">
    <a class="relative mx-3 mt-3 flex overflow-hidden rounded-xl" href="{{ route('product.show', $slug) }}">
      @if ($image)
        <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" title="{{ $name }}" loading="lazy" src="{{ Storage::url($image) }}" alt="{{ $name }}" />
      @else
        <img class="sm:object-cover object-contain w-full h-full bg-gray-200" width="auto" height="auto" title="{{ $name }}" loading="lazy" src="/assets/imgs/placeholder-image.webp" alt="{{ $name }}" />
      @endif
    </a>
    <div class="mt-4 px-5 pb-5">
      <a href="{{ route('product.show', $slug) }}">
        <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $name }}</h3>
      </a>
      <div class="mt-2 mb-5 flex items-center justify-between">
        <p>
          <span class="text-xl font-bold text-slate-900">{{ $price }} (MAD)</span>
        </p>
      </div>
      <a href="{{ route('product.show', $slug) }}" class="flex items-center justify-center rounded-md bg-red-500 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-red-400">
        Découvrez
    </a>
    </div>
</div>


<div class="rounded-xl border border-gray-200 bg-white shadow-sm">
    <a class="relative mx-3 mt-3 flex overflow-hidden rounded-xl max-h-96 image-wrapper loading" href="{{ route('product.show', $slug) }}">
      @if ($image)
          <x-image 
              image="{{ url(e(config('app.storage')), e($image)) }}" 
              alt="{{ e($name) }}" 
              class="object-{{ $category == 'Parquets' ? 'cover' : 'contain' }} w-full bg-gray-200 min-h-52" 
          />
      @else
          <img 
              class="object-cover w-full bg-gray-200 min-h-52" 
              width="auto" 
              height="auto" 
              title="{{ e($name) }}" 
              loading="lazy" 
              src="/assets/imgs/placeholder-image.webp" 
              alt="{{ e($name) }}" 
          />
      @endif
    </a>
  <div class="mt-4 px-5 pb-5">
      <a href="{{ route('product.show', $slug) }}">
          <h3 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ e($name) }}</h3>
      </a>

      @if ($price !== 0)
          <div class="mt-2 mb-5 flex items-center justify-between">
              <p>
                  <span class="text-md font-bold text-slate-900">{{ $price }} (MAD)</span>
              </p>
          </div>
      @endif
      <a href="{{ route('product.show', $slug) }}" class="flex items-center justify-center rounded-md bg-red-500 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-red-400">
          Découvrez
      </a>
  </div>
</div>
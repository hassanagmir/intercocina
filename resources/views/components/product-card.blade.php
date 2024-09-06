<div class="rounded-xl border border-gray-200 bg-white shadow-sm">
    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="{{ route('product.show', $slug) }}">
      <img class="object-cover w-full h-full" src="{{ Storage::url($image) }}" alt="{{ $name }}" />
    </a>
    <div class="mt-4 px-5 pb-5">
      <a href="{{ route('product.show', $slug) }}">
        <h5 class="text-lg font-semibold leading-tight text-gray-900 hover:underline">{{ $name }}</h5>
      </a>
      <div class="mt-2 mb-5 flex items-center justify-between">
        <p>
          <span class="text-xl font-bold text-slate-900">{{ $price }} (MAD)</span>
        </p>
      </div>
      <a href="{{ route('product.show', $slug) }}" class="flex items-center justify-center rounded-md bg-red-500 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-red-400 focus:outline-none focus:ring-4 focus:ring-blue-300">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg> --}}
        Découvrez 
    </a>
    </div>
</div>


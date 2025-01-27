<div class="flex flex-col md:flex-row px-4 mt-3">
    {{-- List of images --}}
    <div class="w-full md:w-1/3 p-4">
        <div class="relative mb-4">
            <input
              class="appearance-none border-2 pl-10 border-gray-300 hover:border-gray-400 transition-colors rounded-md w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:ring-red-600 focus:border-red-600 focus:shadow-outline"
              id="username"
              type="text"
              wire:keyup="search"
              wire:model.live="query"
              placeholder="Couleur, Référence..."
            />
            <div class="absolute right-0 inset-y-0 flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="-ml-1 mr-3 h-5 w-5 text-gray-400 hover:text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                wire:click="clear"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </div>
          
            <div class="absolute left-0 inset-y-0 flex items-center">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 ml-3 text-gray-400 hover:text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                wire:loading.remove
                wire:target="search"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                />
              </svg>
            </div>

            <div wire:loading wire:target="search" role="status" class="absolute left-0 inset-y-0 flex items-center">
                <svg aria-hidden="true" class="w-6 h-6 ml-3 mt-2 text-gray-200 animate-spin [animation-duration:0.5s] dark:text-gray-300 fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>



          </div>
          <div class="grid grid-cols-3 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 pt-3 gap-2 overflow-y-auto max-h-[50hv] sticky top-11 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 hover:scrollbar-thumb-gray-500">
            @forelse ($colors as $color)
                <div wire:click="changeColor('{{ $color->id }}')"  class="bg-white rounded-lg shadow-sm text-center transform duration-300 hover:-translate-y-1 cursor-pointer w-32 xl:w-36 snap-center splide__slide shrink-0 {{ $color->id == $this->color ? 'border-2 border-red-500' : '' }}">
                    <img src="{{ url(config('app.storage'), $color->image) }}" alt="{{ $color->name }}" class="w-full h-auto rounded-t-lg">
                    <div class="mt-2">
                        <span class="text-sm text-gray-600">{{ $color->name }}</span><br>
                        <span class="text-sm text-gray-600">{{ $color->code }}</span>
                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-600 mt-3">Aucune couleur trouvée</div>
            @endforelse
        </div>
    </div>

    {{-- Main image --}}
    <div class="relative w-full md:w-2/3">
        <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black p-2 rounded-t-lg opacity-90" wire:loading wire:target="changeColor">
            <img src="https://letsdesign.esignserver2.com/images/ajax-loader.gif" alt="">
        </span>
        <img src="{{ url(config('app.storage'), $image) }}" alt="Virtual image" class="w-full h-auto rounded-t-lg shadow-sm">
        <div class="p-3 bg-white rounded-b-lg flex justify-between">
            <div>
                <a href="{{ route('product.show', $currentColor?->product?->slug)}}" class="text-xl flex gap-2 hover:text-red-500" target="_blank">
                    <span>{{ $currentColor->name }} {{ $currentColor->code }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m8.818 15.182l6.364-6.364m-4.95 0h4.95v4.95"/><path d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"/></g></svg>
                </a>
            </div>
            <div class="text-xl">
                <span class="text-[#b6b6b7] font-black tracking-widest" style="font-family: 'DOCK11-Heavy', sans-serif!important">INTER</span><span class="text-[#ec2228] font-black tracking-widest" style="font-family: 'DOCK11-Heavy', sans-serif!important">COCINA</span>
            </div>
        </div>
    </div>
</div>

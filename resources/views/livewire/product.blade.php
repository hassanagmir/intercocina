<div class="grid grid-cols-1 lg:grid-cols-2">
    <div class="slider-box w-full h-full max-lg:mx-auto mx-0">
        <div class="swiper main-slide-carousel swiper-container relative mb-6">
            <div class="swiper-wrapper">
                @foreach ($product->images as $image)
                <div class="swiper-slide">
                    <div class="block">
                        <img src="{{ Storage::url($image->image) }}" alt="{{ $product->name }}" class="max-lg:mx-auto rounded-2xl">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="nav-for-slider ">
            <div class="swiper-wrapper">
                @foreach ($product->images as $image)
                    <div class="swiper-slide thumbs-slide">
                        <img src="{{ Storage::url($image->image)}}" alt="{{ $product->name }}" class="cursor-pointer rounded-xl transition-all duration-500 ">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="pro-detail w-full max-lg:max-w-[608px] lg:pl-8 xl:pl-16 max-lg:mx-auto max-lg:mt-8">
            <div class="flex items-center justify-between gap-6 mb-6">
                <div class="text">
                    <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 mb-2">{{ $product->name }}</h2>
                    <p class="font-normal text-base text-gray-500">{{ $product->type->name }}</p>
                </div>
                <button class="group transition-all duration-500 p-0.5">
                    <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle
                            class="fill-red-50 transition-all duration-500 group-hover:fill-red-100"
                            cx="30" cy="30" r="30" fill="" />
                        <path
                            class="stroke-red-600 transition-all duration-500 group-hover:stroke-red-700"
                            d="M21.4709 31.3196L30.0282 39.7501L38.96 30.9506M30.0035 22.0789C32.4787 19.6404 36.5008 19.6404 38.976 22.0789C41.4512 24.5254 41.4512 28.4799 38.9842 30.9265M29.9956 22.0789C27.5205 19.6404 23.4983 19.6404 21.0231 22.0789C18.548 24.5174 18.548 28.4799 21.0231 30.9184M21.0231 30.9184L21.0441 30.939M21.0231 30.9184L21.4628 31.3115"
                            stroke="" stroke-width="1.6" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
            <p class="mt-2">{{ $product->description }}</p>

            <div class="flex flex-col min-[400px]:flex-row min-[400px]:items-center mb-8 gap-y-3">
                <div class="flex items-center">
                    <h5 class="font-manrope font-semibold text-2xl leading-9 text-gray-900 ">199.00 MAD</h5>
                    <span class="ml-3 font-semibold text-lg text-red-600">30% off</span>
                </div>
                <svg class="mx-5 max-[400px]:hidden" xmlns="http://www.w3.org/2000/svg" width="2"
                    height="36" viewBox="0 0 2 36" fill="none">
                    <path d="M1 0V36" stroke="#E5E7EB" />
                </svg>
                <button class="flex items-center gap-1 rounded-lg bg-amber-400 py-1.5 px-2.5 w-max">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_12657_16865)">
                            <path
                                d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                fill="white" />
                            <g clip-path="url(#clip1_12657_16865)">
                                <path
                                    d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z"
                                    fill="white" />
                            </g>
                        </g>
                        <defs>
                            <clipPath id="clip0_12657_16865">
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                            <clipPath id="clip1_12657_16865">
                                <rect width="18" height="18" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                    <span class="text-base font-medium text-white">4.8</span>
                </button>
            </div>

            @empty (!$product->colors->count())
                <p class="font-medium text-lg text-gray-900 mb-2">{{__("Couleur")}}</p>
                <ul class="flex flex-wrap gap-2 mb-6 max-w-sm">
                    @foreach ($product->colors as $color)
                        <li class="color-box group text-center me-3">
                            <input type="radio" id="color-{{ $color->id }}" name="hosting" wire:model="color" class="hidden peer" value="{{ $color->name }}" required />
                            <label for="color-{{ $color->id }}" style="background-image: url({{ Storage::url($color->image)}})" class="inline-flex items-center border-2 justify-between w-full p-6 text-gray-500 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-red-500 peer-checked:border-red-600 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                            </label>
                            <div>{{ $color->name }}</div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-2 text-red-700">@error('color') {{ $message }} @enderror</div>
            @endempty


            @empty(!$product->dimensions)
                <label for="dimension" class="font-medium text-lg text-gray-900 mb-2">{{__("Hauteur x Largeur (mm)")}}</label>
                <select id="dimension" wire:model='dimension' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>{{ __("Choisir un dimension") }}</option>
                    @foreach ($product->dimensions as $dimension)
                        <option value="{{ $dimension->id }}">{{ $dimension->dimension }} - {{ $dimension->price}} MAD</option>
                    @endforeach
                </select>
                <div class="mt-2 text-red-700">@error('dimension') {{ $message }} @enderror</div>
            @endempty



            
            <div class="mt-6 flex items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                <div x-data="{ quantity: 1 }" class="flex items-center justify-center border border-gray-400 rounded-full">
                    <button @click="if (quantity > 1) quantity--" class="group text-3xl py-2 px-3 w-full border-r border-gray-400 rounded-l-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                        -
                    </button>
                    <input type="text" x-model="quantity" placeholder="0" class="font-semibold text-gray-900 text-lg py-3 px-2 w-full min-[400px]:min-w-[75px] h-full bg-transparent placeholder:text-gray-900 text-center hover:text-red-600 outline-0 hover:placeholder:text-red-600">
                    <button @click="quantity++" class="group text-3xl py-2 px-3 w-full border-l border-gray-400 rounded-r-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                        +
                    </button>
                </div>

                <button wire:click='add()' class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                    <svg wire:loading.remove class="stroke-red-600 transition-all duration-500 group-hover:red-red-600"
                        width="22" height="22" viewBox="0 0 22 22" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75"
                            stroke="" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <div role="status" wire:loading >
                        <svg aria-hidden="true" class="inline me-1.5 h-5 w-5 text-white animate-spin dark:text-gray-600 fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                    </div>
                    {{ __("Ajouter au panier") }}</button>
            </div>
        </div>
    </div>
</div>

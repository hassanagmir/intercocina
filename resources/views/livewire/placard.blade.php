<div>
    <div class="bg-gray-50 py-6 rounded-xl border">
        <div class="grid grid-cols-1 lg:grid-cols-2 ">
            <div class="slider-box w-full h-full max-lg:mx-auto mx-3">
                <!-- Main Swiper -->
                <div class="swiper main-slide-carousel swiper-container relative mb-6">
                    <div class="swiper-wrapper" id="gallery">
                        @foreach ($product->images()->orderBy('order')->get() as $image)
                        <a role="Product" href="{{ Storage::url($image->image) }}" alt="{{ $product->name }}" class="swiper-slide pswp-gallery__item h-auto" data-pswp-width="1475" data-pswp-height="2000" target="_blank">
                            <img src="{{ Storage::url($image->image) }}" loading="lazy" title="{{ $product->name }}" alt="{{ $product->name }}" width="auto" height="auto" class="max-lg:mx-auto rounded-2xl m-auto max-h-[500px]">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="pro-detail w-full max-lg:max-w-[608px] lg:pl-8 xl:pl-12 max-lg:mx-auto max-lg:mt-6 px-3">
                    <div class="sm:flex flex-initial items-center justify-between gap-6 mb-4">
                        <div class="text">
                            <h1 class="font-manrope font-bold sm:text-3xl text-2xl leading-10 text-gray-900 mb-2">{{ $product->name }}</h1>
                            <h2 class="font-normal text-base text-gray-500">{{ $product->type->name }}</h2>
                        </div>
                        @if (auth()?->user()?->hasRole("super_admin"))
                        <a  href="/admin/products/{{ $product->id }}/edit" class="group transition-all duration-500 p-0.5 sm:block hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path class="stroke-green-600 transition-all duration-500 group-hover:stroke-green-700" d="M9.533 11.15A1.82 1.82 0 0 0 9 12.438V15h2.578c.483 0 .947-.192 1.289-.534l7.6-7.604a1.82 1.82 0 0 0 0-2.577l-.751-.751a1.82 1.82 0 0 0-2.578 0z"/>
                                    <path class="stroke-green-600 transition-all duration-500 group-hover:stroke-green-700" d="M21 12c0 4.243 0 6.364-1.318 7.682S16.242 21 12 21s-6.364 0-7.682-1.318S3 16.242 3 12s0-6.364 1.318-7.682S7.758 3 12 3"/>
                                </g>
                            </svg>
                        </a>   
                        @endif
                    </div>
                    @if ($product->description)
                        <p class="mb-3">{{ $product->description }}</p>
                    @else
                        <p class="mb-3">{{ $product?->type->description }}</p>
                    @endif

                    <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                        <button  class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                            {{ __("Contactez-nous") }}
                        </button>

                        <a href="" class="group border-2 border-[#25d366] py-3 px-5 rounded-full bg-green-50 text-[#25d366] font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-green-300 hover:bg-green-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34" class="text-[#25d366]" height="34" viewBox="0 0 71 72" fill="none">
                                <path d="M12.5068 56.8405L15.7915 44.6381C13.1425 39.8847 12.3009 34.3378 13.4211 29.0154C14.5413 23.693 17.5482 18.952 21.89 15.6624C26.2319 12.3729 31.6173 10.7554 37.0583 11.1068C42.4992 11.4582 47.6306 13.755 51.5108 17.5756C55.3911 21.3962 57.7599 26.4844 58.1826 31.9065C58.6053 37.3286 57.0535 42.7208 53.812 47.0938C50.5705 51.4668 45.8568 54.5271 40.5357 55.7133C35.2146 56.8994 29.6432 56.1318 24.8438 53.5513L12.5068 56.8405ZM25.4386 48.985L26.2016 49.4365C29.6779 51.4918 33.7382 52.3423 37.7498 51.8555C41.7613 51.3687 45.4987 49.5719 48.3796 46.7452C51.2605 43.9185 53.123 40.2206 53.6769 36.2279C54.2308 32.2351 53.445 28.1717 51.4419 24.6709C49.4388 21.1701 46.331 18.4285 42.6027 16.8734C38.8745 15.3184 34.7352 15.0372 30.8299 16.0736C26.9247 17.11 23.4729 19.4059 21.0124 22.6035C18.5519 25.801 17.2209 29.7206 17.2269 33.7514C17.2237 37.0937 18.1503 40.3712 19.9038 43.2192L20.3823 44.0061L18.546 50.8167L25.4386 48.985Z" fill="#25d366" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M43.9566 36.8847C43.5093 36.5249 42.9856 36.2716 42.4254 36.1442C41.8651 36.0168 41.2831 36.0186 40.7236 36.1495C39.8831 36.4977 39.3399 37.8134 38.7968 38.4713C38.6823 38.629 38.514 38.7396 38.3235 38.7823C38.133 38.8251 37.9335 38.797 37.7623 38.7034C34.6849 37.5012 32.1055 35.2965 30.4429 32.4475C30.3011 32.2697 30.2339 32.044 30.2557 31.8178C30.2774 31.5916 30.3862 31.3827 30.5593 31.235C31.165 30.6368 31.6098 29.8959 31.8524 29.0809C31.9063 28.1818 31.6998 27.2863 31.2576 26.5011C30.9157 25.4002 30.265 24.42 29.3825 23.6762C28.9273 23.472 28.4225 23.4036 27.9292 23.4791C27.4359 23.5546 26.975 23.7709 26.6021 24.1019C25.9548 24.6589 25.4411 25.3537 25.0987 26.135C24.7562 26.9163 24.5939 27.7643 24.6236 28.6165C24.6256 29.0951 24.6864 29.5716 24.8046 30.0354C25.1049 31.1497 25.5667 32.2144 26.1754 33.1956C26.6145 33.9473 27.0937 34.6749 27.6108 35.3755C29.2914 37.6767 31.4038 39.6305 33.831 41.1284C35.049 41.8897 36.3507 42.5086 37.7105 42.973C39.1231 43.6117 40.6827 43.8568 42.2237 43.6824C43.1018 43.5499 43.9337 43.2041 44.6462 42.6755C45.3588 42.1469 45.9302 41.4518 46.3102 40.6512C46.5334 40.1675 46.6012 39.6269 46.5042 39.1033C46.2714 38.0327 44.836 37.4007 43.9566 36.8847Z" fill="#25d366" />
                            </svg>
                            <span>Whatsapp</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper nav-for-slider mx-2">
                <div class="swiper-wrapper">
                    @foreach ($product->images()->orderBy('order')->get() as $image)
                    <div class="swiper-slide thumbs-slide">
                        <div class="relative">
                            <div class="peer cursor-pointer rounded-md bg-neutral-50 px-4 py-2 font-medium tracking-wide text-neutral-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" >
                                {{-- <img src="{{ Storage::url($image->color->image )}}" loading="lazy" title="{{ $product->name }}" alt="{{ $product->name }}" width="auto" height="auto" class="cursor-pointer rounded-xl transition-all duration-500 max-h-36" > --}}
                            </div>
                            <div class="bottom-full min-w-[10rem] left-1/2  mb-2 z-50 whitespace-nowrap rounded bg-neutral-950 px-2 py-1 text-center text-sm text-white opacity-0 transition-opacity duration-300 ease-out peer-hover:opacity-100 peer-focus:opacity-100" role="tooltip">
                                {{-- {{ $image->color->name }} --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="p-4 rounded-xl border bg-white mt-4">
        <h2 class="sm:text-2xl text-xl font-bold">{{ __("Détails du produit")}} {{ $product->name}}</h2>
        @if ($product->options)
        <div class="relative overflow-x-auto border-t-2 border-x-2 sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right">
                <tbody>
                    @foreach ($product->options as $key => $value)
                    <tr class="border-b-2 font-semibold hover:bg-gray-50 duration-500">
                        <th scope="row" class="px-6 py-4 text-gray-900 whitespace-nowrap">
                            {{ $key }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        <div class="mt-4 prose">
            {!! $product->content !!}
        </div>

        {{-- Les panneaux --}}
        <div class="border-2 p-3 rounded-2xl ">
            <div class="flex items-center gap-3">
                <img src="/icons/panneaux-icon.png" class="w-10" alt="Les panneaux">
                <span class="text-xl font-semibold">Les panneaux</span>
            </div>
            <div class="mt-3 text-lg">
                Nos marques proposent deux types de panneaux de haute qualité pour la fabrication de vos placards : MDF et Aggloméré. Ces panneaux sont conçus à partir de particules de bois haute densité, garantissant solidité et durabilité pour des aménagements sur mesure. Vous avez également le choix parmi plusieurs épaisseurs : 16 mm, 18 mm ou 22 mm, pour une personnalisation complète.
            </div>
        </div>

        <div class="border-2 p-3 rounded-2xl mt-3">
            <div class="flex items-center gap-3">
                <img src="/icons/porte-coulissante-icon.png" class="w-10" alt="Portes coulissantes">
                <span class="text-xl font-semibold">Portes coulissantes</span>
            </div>
            <div class="mt-3 text-lg">
                <p>Portes coulissantes : sécurité de fonctionnement garantie !</p>
                Le système élimine tout risque de déraillement de la porte. Grâce aux rails en aluminium équipés d'une roue supérieure et d'une roue inférieure, la porte devient plus légère et garantit une ouverture fluide.
            </div>
        </div>

        <div class="border-2 p-3 rounded-2xl mt-3">
            <div class="flex items-center gap-3">
                <img src="/icons/tiroir-icon.png" class="w-10" alt="Les tiroirs">
                <span class="text-xl font-semibold">Les tiroirs</span>
            </div>
            <div class="mt-3 text-lg">
                Vous avez la possibilité d'intégrer des tiroirs à votre placard pour maximiser l'espace, selon vos envies. Choisissez parmi une gamme de façades et de couleurs pour une personnalisation complète. Les tiroirs peuvent être ajoutés à l'endroit de votre choix, en fonction de vos besoins. <br>
                et un system d'amortisseurs pour éviter les frottements.
            </div>
        </div>

        <div class="border-2 p-3 rounded-2xl mt-3">
            <div class="flex items-center gap-3">
                <img src="/icons/tablette-icon.png" class="w-10" alt="Les tablettes">
                <span class="text-xl font-semibold">Les tablettes</span>
            </div>
            <div class="mt-3 text-lg">
                Les tablettes sont conçues pour optimiser votre espace de rangement avec style et fonctionnalité. Fabriquées à partir de matériaux robustes et disponibles en différentes finitions et dimensions, elles s'adaptent parfaitement à tous vos besoins d'aménagement. Installées à l’aide du système Rafix double, elles offrent un soutien accru, permettant de supporter plus de poids.
            </div>
        </div>


        <div class="border-2 p-3 rounded-2xl mt-3">
            <div class="flex items-center gap-3">
                <img src="/icons/penderie-icon.png" class="w-10" alt="Les penderies">
                <span class="text-xl font-semibold">Les penderies</span>
            </div>
            <div class="mt-3 text-lg">
                Nos penderies de placard offrent des solutions pratiques et personnalisées pour optimiser votre espace de rangement. Nous proposons trois types de penderies pour répondre à vos besoins.

                <div class="mt-3 space-y-2">
                
                    <p> <strong>Barre de penderie</strong>: Fabriquée en aluminium, cette barre robuste assure un support durable pour suspendre vos vêtements en toute sécurité.</p>

                    <p><strong>Porte-vêtements rabattable</strong>: Idéal pour les espaces en hauteur, ce système rabattable permet d’accéder facilement à vos vêtements tout en maximisant l’espace disponible.</p>

            
                   <p><strong>Port-pantalon </strong>: Un accessoire pratique pour organiser vos pantalons de manière ordonnée, tout en optimisant l’espace de votre placard.</p>

                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-3">
                    <div>
                        <img class="h-auto border max-w-full rounded-lg" src="/assets/azmac.png" alt="Barre de penderie">
                    </div>
                    <div>
                        <img class="h-auto border max-w-full rounded-lg" src="/assets/colgador.png" alt="Porte-vêtements rabattable">
                    </div>
                    <div>
                        <img class="h-auto border max-w-full rounded-lg" src="/assets/pantalonero.png" alt="Port-pantalon">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 rounded-xl border bg-white mt-4" style="user-select: none">
        <h2 class="sm:text-2xl text-xl font-bold">Vous êtes notre inspiration</h2>
        
        <div class="swiper swiper-evnet mt-3">
            <div class="swiper-wrapper">
            
              <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <img src="/assets/placards/ABT 01.jpg" alt="Card 1" class="w-full h-80 object-cover">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <img src="/assets/placards/ABT 02.jpg" alt="Card 1" class="w-full h-80 object-cover">
                </div>
              </div>

              <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <img src="/assets/placards/ABT GARD 02.jpg" alt="Card 1" class="w-full h-80 object-cover">
                </div>
              </div>


              <div class="swiper-slide">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                  <img src="/assets/placards/ABT GARD 02.jpg" alt="Card 1" class="w-full h-80 object-cover">
                </div>
              </div>
            </div>
            {{-- <div class="swiper-pagination"></div> --}}
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
          </div>
    </div>
</div>
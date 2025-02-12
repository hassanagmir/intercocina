import React from 'react';

const Product = () => {
    return (
        <div class="grid grid-cols-1 lg:grid-cols-2 bg-gray-50 py-6 rounded-xl border">
            <div class="slider-box w-full h-full max-lg:mx-auto mx-0">
                <div class="swiper main-slide-carousel ml-3 swiper-container relative mb-6 swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper pswp-gallery" id="gallery" aria-live="polite">
                        <a href="http://localhost:8000/storage/01J9VBK02RGVF703GREYCX4X4W.png" data-pswp-width="1669" data-pswp-height="2500" target="_blank" class="swiper-slide mt-0 image-wrapper swiper-slide-active swiper-slide-next" role="group" aria-label="1 / 1" data-swiper-slide-index="0">

                            <img class="lazy-image max-lg:mx-auto rounded-2xl m-auto max-h-[500px] mt-0 loaded" image="http://localhost:8000/storage/01J9VBK02RGVF703GREYCX4X4W.png" alt="Façade Laca G3 Vittoria" data-src="http://localhost:8000/storage/01J9VBK02RGVF703GREYCX4X4W.png" src="http://localhost:8000/storage/01J9VBK02RGVF703GREYCX4X4W.png" />                        </a>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

                <div class="swiper nav-for-slider mx-2 swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                    <div class="swiper-wrapper" id="swiper-wrapper-6bae177b97ab5da4" aria-live="polite">
                        <div class="swiper-slide thumbs-slide image-wrapper loading swiper-slide-visible swiper-slide-fully-visible swiper-slide-active swiper-slide-next swiper-slide-thumb-active" role="group" aria-label="1 / 1" data-swiper-slide-index="0">
                            <img src="http://localhost:8000/storage/01J9VBK02RGVF703GREYCX4X4W.png" loading="lazy" title="Façade Laca G3 Vittoria" alt="Façade Laca G3 Vittoria" width="auto" height="auto" class="cursor-pointer rounded-xl transition-all duration-500 max-h-36" />
                        </div>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="pro-detail w-full max-lg:max-w-[608px] lg:pl-8 xl:pl-12 max-lg:mx-auto max-lg:mt-6 px-3">
                    <div class="sm:flex flex-initial items-center justify-between gap-6 mb-4">
                        <div class="text">
                            <h1 class="font-manrope font-bold sm:text-3xl text-2xl leading-10 text-gray-900 mb-2">Façade Laca G3 Vittoria</h1>
                            <h2 class="font-normal text-base text-gray-500">
                                Façade Laca </h2>
                        </div>
                        <a href="/admin/products/213/edit" class="group transition-all duration-500 p-0.5 sm:block hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                    <path class="stroke-green-600 transition-all duration-500 group-hover:stroke-green-700" d="M9.533 11.15A1.82 1.82 0 0 0 9 12.438V15h2.578c.483 0 .947-.192 1.289-.534l7.6-7.604a1.82 1.82 0 0 0 0-2.577l-.751-.751a1.82 1.82 0 0 0-2.578 0z"></path>
                                    <path class="stroke-green-600 transition-all duration-500 group-hover:stroke-green-700" d="M21 12c0 4.243 0 6.364-1.318 7.682S16.242 21 12 21s-6.364 0-7.682-1.318S3 16.242 3 12s0-6.364 1.318-7.682S7.758 3 12 3"></path>
                                </g>
                            </svg>
                        </a>


                    </div>
                    <p class="mb-3">Laca est une collection de façades et ports peintes, composée de 3 groups, offrant 10 designs et 11 couleurs différentes, fabriqués en MDF avec un haut qualité.</p>

                    <div class="flex flex-col min-[400px]:flex-row min-[400px]:items-center mb-5 gap-y-3 flex-wrap">
                        <div class="flex items-center">
                            <div class="font-manrope font-semibold sm:text-2xl text-xl leading-9 text-gray-900">
                                <div role="status">
                                    <svg aria-hidden="true" class="inline me-1.5 h-5 w-5 text-white animate-spin fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                    </svg>
                                </div>
                                <span>59.40 - 2177.99</span> MAD
                            </div>
                            <span class="ml-3 font-semibold text-lg text-green-600"> Sur demande </span>
                        </div>


                        <svg class="mx-5 max-[400px]:hidden" xmlns="http://www.w3.org/2000/svg" width="2" height="36" viewBox="0 0 2 36" fill="none">
                            <path d="M1 0V36" stroke="#E5E7EB"></path>
                        </svg>
                        <button class="flex items-center gap-1 rounded-lg bg-amber-400 py-1.5 px-2.5 w-max">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_12657_16865)">
                                    <path d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z" fill="white"></path>
                                    <g clip-path="url(#clip1_12657_16865)">
                                        <path d="M8.10326 2.26718C8.47008 1.52393 9.52992 1.52394 9.89674 2.26718L11.4124 5.33818C11.558 5.63332 11.8396 5.83789 12.1653 5.88522L15.5543 6.37768C16.3746 6.49686 16.7021 7.50483 16.1086 8.08337L13.6562 10.4738C13.4205 10.7035 13.313 11.0345 13.3686 11.3589L13.9475 14.7343C14.0877 15.5512 13.2302 16.1742 12.4966 15.7885L9.46534 14.1948C9.17402 14.0417 8.82598 14.0417 8.53466 14.1948L5.5034 15.7885C4.76978 16.1742 3.91235 15.5512 4.05246 14.7343L4.63137 11.3589C4.68701 11.0345 4.57946 10.7035 4.34378 10.4738L1.89144 8.08337C1.29792 7.50483 1.62543 6.49686 2.44565 6.37768L5.8347 5.88522C6.16041 5.83789 6.44197 5.63332 6.58764 5.33818L8.10326 2.26718Z" fill="white"></path>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_12657_16865">
                                        <rect width="18" height="18" fill="white"></rect>
                                    </clipPath>
                                    <clipPath id="clip1_12657_16865">
                                        <rect width="18" height="18" fill="white"></rect>
                                    </clipPath>
                                </defs>
                            </svg>
                            <span class="text-base font-medium text-white">0</span>
                        </button>
                    </div>

                    <div class="md:flex">
                        <div>
                            <p class="font-bold text-gray-900">Type de  Façade</p>
                            <select name="attribute" id="attribute" class="text-black/70 mb-3 bg-white px-3 py-2 font-semibold transition-all cursor-pointer hover:border-blue-600/30 border-gray-200 rounded-lg outline-blue-600/50 appearance-none invalid:text-black/30 w-64 border-2">
                                <option value="3">Porte</option>
                                <option value="4">Face cassrolier</option>
                                <option value="2">Face tiroir</option>
                                <option value="5">Reglette</option>
                            </select>
                        </div>


                        <div class="md:ms-4">
                            <p class="font-bold text-gray-900">Special</p>
                            <div class="text-black/70 mb-3 bg-white px-3 py-3 flex items-center font-semibold transition-all cursor-pointer hover:border-blue-600/30 border-gray-200 rounded-lg outline-blue-600/50 appearance-none invalid:text-black/30 w-64 border-2">
                                <input id="bordered-checkbox-1" type="checkbox" name="bordered-checkbox" class="h-4 w-4 text-blue-600 bg-gray-100 border-gray-300 rounded" />
                                <label for="bordered-checkbox-1" class="w-full h-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Special</label>
                            </div>
                        </div>

                    </div>

                    <p class="font-bold text-gray-900">Couleur</p>
                    <ul class="flex flex-wrap gap-2 mb-4">
                        {
                            colors.map(color, index => {
                                return (
                                    <li class="color-box group text-center me-3 relative">
                                        <input type="radio" value={color.id} id={`color-${color.id}`} name="color" class="hidden peer" required="" />
                                        <label for={`color-${color.id}`} class="inline-flex items-center justify-between w-full p-4 text-gray-500 border-gray-500 rounded-lg cursor-pointer peer-checked:border-red-600 peer-checked:border-4 border-2 peer-checked:text-red-600 hover:text-gray-600 hover:bg-gray-100"></label>
                                        <div id="tooltipExample" class="-top-56 hidden absolute overflow-hidden bg-neutral-950 ease-out left-1/2 p-0 border-black border-2 peer-focus:block peer-hover:block rounded text-center text-sm text-white transition-all w-40 whitespace-nowrap z-10" role="tooltip">
                                            {color.name}
                                            <img class="w-full" src={color.image} alt="" />
                                        </div>
                                    </li>
                                )
                            }) 
                        }

                    </ul>
                    <div class="font-bold">Hauteur</div>
                    <ul class="flex flex-wrap w-full gap-3">
                        <li>
                            <input type="radio" id="height-350" value="350" name="height" class="hidden peer" />
                            <label for="height-350" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">350</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-450" value="450" name="height" class="hidden peer" />
                            <label for="height-450" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">450</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-600" value="600" name="height" class="hidden peer" />
                            <label for="height-600" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">600</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-700" value="700" name="height" class="hidden peer" />
                            <label for="height-700" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">700</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-900" value="900" name="height" class="hidden peer" />
                            <label for="height-900" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">900</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-1300" value="1300" name="height" class="hidden peer" />
                            <label for="height-1300" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">1300</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-2000" value="2000" name="height" class="hidden peer" />
                            <label for="height-2000" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">2000</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="height-2200" value="2200" name="height" class="hidden peer" />
                            <label for="height-2200" class="border-2 cursor-pointer inline-flex items-center justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg border-1 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">2200</div>
                                </div>
                            </label>
                        </li>

                    </ul>


                    <div class="font-bold">Largeur</div>
                    <ul class="flex flex-wrap w-full gap-3">
                        <li>
                            <input type="radio" id="width-300" value="300" name="width" class="hidden peer" />
                            <label for="width-300" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">300</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-350" value="350" name="width" class="hidden peer" />
                            <label for="width-350" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">350</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-400" value="400" name="width" class="hidden peer" />
                            <label for="width-400" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">400</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-450" value="450" name="width" class="hidden peer" />
                            <label for="width-450" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">450</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-500" value="500" name="width" class="hidden peer" />
                            <label for="width-500" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">500</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-600" value="600" name="width" class="hidden peer" />
                            <label for="width-600" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">600</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-700" value="700" name="width" class="hidden peer" />
                            <label for="width-700" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">700</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-800" value="800" name="width" class="hidden peer" />
                            <label for="width-800" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">800</div>
                                </div>
                            </label>
                        </li>
                        <li>
                            <input type="radio" id="width-900" value="900" name="width" class="hidden peer" />
                            <label for="width-900" class="inline-flex items-center  justify-between p-2 px-3 text-gray-500 bg-white border-gray-200 rounded-lg cursor-pointer border-2 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                <div class="block">
                                    <div class="w-full text-md font-semibold">900</div>
                                </div>
                            </label>
                        </li>

                    </ul>



                    <div class="mt-6 sm:flex flex-initial space-y-4 sm:space-y-0 items-center flex-col min-[400px]:flex-row gap-3 mb-3 min-[400px]:mb-8">
                        <div class="flex items-center justify-center border border-gray-400 rounded-full">
                            <button class="group text-3xl py-2 px-3 w-full border-r border-gray-400 rounded-l-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                                -
                            </button>
                            <label class="hidden" for="qty">Quantity:</label>
                            <input type="number" name="qty" id="qty" class="font-semibold text-gray-900 text-lg py-3 px-2 w-full min-[400px]:min-w-[75px] h-full bg-transparent placeholder:text-gray-900 text-center hover:text-red-600 outline-0 hover:placeholder:text-red-600" />
                            <button class="group text-3xl py-2 px-3 w-full border-l border-gray-400 rounded-r-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
                                +
                            </button>
                        </div>

                        <button class="group border-2 border-red-400 py-3 px-5 rounded-full bg-red-50 text-red-600 font-semibold text-lg w-full flex items-center justify-center gap-2 shadow-sm shadow-transparent transition-all duration-500 hover:shadow-red-300 hover:bg-red-100">
                            <svg class="stroke-red-600 transition-all duration-500 group-hover:red-red-600" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.7394 17.875C10.7394 18.6344 10.1062 19.25 9.32511 19.25C8.54402 19.25 7.91083 18.6344 7.91083 17.875M16.3965 17.875C16.3965 18.6344 15.7633 19.25 14.9823 19.25C14.2012 19.25 13.568 18.6344 13.568 17.875M4.1394 5.5L5.46568 12.5908C5.73339 14.0221 5.86724 14.7377 6.37649 15.1605C6.88573 15.5833 7.61377 15.5833 9.06984 15.5833H15.2379C16.6941 15.5833 17.4222 15.5833 17.9314 15.1605C18.4407 14.7376 18.5745 14.0219 18.8421 12.5906L19.3564 9.84059C19.7324 7.82973 19.9203 6.8243 19.3705 6.16215C18.8207 5.5 17.7979 5.5 15.7522 5.5H4.1394ZM4.1394 5.5L3.66797 2.75" stroke="" stroke-width="1.6" stroke-linecap="round"></path>
                            </svg>
                            <div role="status">
                                <svg aria-hidden="true" class="inline me-1.5 h-5 w-5 text-white animate-spin fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"></path>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"></path>
                                </svg>
                            </div>
                            Ajouter au panier
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Product;
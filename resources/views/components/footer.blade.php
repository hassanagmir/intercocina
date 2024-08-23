        
<footer class="px-4 pb-10 mt-24 overflow-hidden md:max-w-7xl md:mx-auto">
    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-4 xl:col-span-1 col-span-full" x-animate.intersect="fadeInRight">
                <img class="w-[200px]" loading="lazy" src="https://new.digiton.ma/assets/images/Logo-Digiton-2L.svg" alt="">
                <p class="text-slate-500 md:max-w-[400px]">
                    INTERCOCINA, agence de marketing digital, offre des sites internet performants,
                    des vidéos de qualité, et une gestion optimale des réseaux sociaux.
                    Nous nous engageons à augmenter votre visibilité et à atteindre vos objectifs de croissance.
                </p>
            </div>
            <div
                class="flex flex-col items-stretch gap-10 my-10 md:flex-row md:justify-center md:py-24 md:my-0 xl:col-span-1 col-span-full">
                <div class="flex items-center gap-3 px-6 py-3 duration-500 shadow-lg bg-accent-green-350 rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="https://new.digiton.ma/assets/images/mail.png" alt="">
                    <div>
                        <p class="text-lg font-bold text-white ">Envoyez-nous un email</p>
                        <p class="text-white">hello@digiton.com</p>
                    </div>

                </div>
                <div class="flex items-center gap-3 px-6 py-3 duration-500 bg-white shadow-lg rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="https://new.digiton.ma/assets/images/phone.png" alt="">
                    <div>
                        <p class="text-lg font-bold ">Appelez-nous</p>
                        <p>+212 0000000</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <hr class="h-px my-10 bg-gray-200 border-0">

    <section class="flex flex-col gap-16 mb-8 lg:flex-row lg:justify-between">
        <div class="flex justify-around order-2 gap-10 xl:order-1">
            <div class="flex flex-col">
                <h4 class="py-6 text-lg text-accent-green">Pages</h4>
                <div class="flex gap-10">
                    <ul class="space-y-5">
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/">Accueil</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/notre-processus">Notre Approche</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/case-studies">Case studies</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/portfolio">Portfolio</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-green">
                            <a href="/a-propos">À propos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <h4 class="py-6 text-lg text-accent-green">Ressources</h4>

                <ul class="space-y-5">
                    <li class="text-slate-500 hover:text-accent-green"><a href="/formation">Formation</a>
                    </li>
                    <li class="text-slate-500 hover:text-accent-green">Podcast</li>
                    <li class="text-slate-500 hover:text-accent-green">Privacy policy</li>
                </ul>

            </div>

        </div>

        <div wire:snapshot="{&quot;data&quot;:{&quot;email&quot;:&quot;&quot;,&quot;emailSent&quot;:false},&quot;memo&quot;:{&quot;id&quot;:&quot;kKEOmOQ5b5WFFtONVTU8&quot;,&quot;name&quot;:&quot;newsletterform&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;b938cf710e9a4661db4035480c6283b38128fcce0860e81748010d93b05134c0&quot;}" wire:effects="[]" wire:id="kKEOmOQ5b5WFFtONVTU8"
    class="w-full max-w-lg bg-accent-green px-8 py-16 xl:ml-36 rounded-3xl relative overflow-hidden order-1 xl:order-2 md:flex md:justify-center">
    <div class="w-40 aspect-square rounded-full bg-accent-blue absolute z-0 -bottom-10 -left-10" x-animate.intersect="zoomIn"></div>
    <div class="w-40 aspect-square rounded-full bg-[#58d185] w-36 md:w-80 absolute z-0 -top-16 -right-16 md:-top-28 md:-right-28" x-animate.intersect="zoomIn"></div>

    <div class="w-full relative z-20 space-y-6"
         x-data="{ emailSent: window.Livewire.find('kKEOmOQ5b5WFFtONVTU8').entangle('emailSent').live }"
         x-init="$watch('emailSent', () => { setTimeout(() => emailSent = false, 6000)})">
        <div class="space-y-2">
            <h4 class="text-white text-4xl font-bold uppercase tracking-wide">
                Newsletter
            </h4>
            <p class="text-white text-lg">
                Stay up to date! Subscribe to our newsletter.
            </p>
        </div>
        <div class="flex flex-col gap-4">

            <div class="space-y-2">
    <label for="newsletter_email" for="newsletter_email" class="sr-only">
    Newsletter_email
</label>

    <input type="text" id="newsletter_email" name="newsletter_email"
           placeholder="Email"
           class="w-full rounded-lg border-gray-200 p-4 text-sm  rounded-xl" wire:model="email" label-class="sr-only"/>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
</div>

            <button class="flex items-center justify-center gap-2 text-accent-green bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-green hover:bg-transparent border hover:border-white hover:text-white" wire:click="subscribe" label="Subscribe">

    <svg wire:loading          xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"/>
        <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5"/>
    </svg>

    <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->

    Subscribe
</button>

            <div>
                <!--[if BLOCK]><![endif]--><!--[if ENDBLOCK]><![endif]-->
                <p class="text-white text-sm">
                    We respect your privacy. You can unsubscribe at any time.
                </p>
            </div>
        </div>

    </div>
</div>
    </section>
    <hr class="h-px bg-gray-200 border-0">
    <div class="flex flex-col items-center gap-8 pt-8 md:justify-between lg:flex-row">
        <p class="text-center text-slate-500 md:text-left">
            Copyright © INTERCOCINA 2024. All rights reserved. Made with ❤️ in Nador.
        </p>
        <div>
            <ul class="flex items-center gap-4">
                <li>
                    <a href="https://ma.linkedin.com/company/digiton-ma" aria-label="Linkedin page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="#fff" rx="60" />
                                <rect width="256" height="256" fill="#0a66c2" rx="60" />
                                <path fill="#fff"
                                    d="M184.715 217.685h29.27a4 4 0 0 0 4-3.999l.015-61.842c0-32.323-6.965-57.168-44.738-57.168c-14.359-.534-27.9 6.868-35.207 19.228a.32.32 0 0 1-.595-.161V101.66a4 4 0 0 0-4-4h-27.777a4 4 0 0 0-4 4v112.02a4 4 0 0 0 4 4h29.268a4 4 0 0 0 4-4v-55.373c0-15.657 2.97-30.82 22.381-30.82c19.135 0 19.383 17.916 19.383 31.834v54.364a4 4 0 0 0 4 4M38 59.628c0 11.864 9.767 21.626 21.632 21.626c11.862-.001 21.623-9.769 21.623-21.631C81.253 47.761 71.491 38 59.628 38C47.762 38 38 47.763 38 59.627m6.959 158.058h29.307a4 4 0 0 0 4-4V101.66a4 4 0 0 0-4-4H44.959a4 4 0 0 0-4 4v112.025a4 4 0 0 0 4 4" />
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/OnYourDigital?_rdc=1&_rdr" aria-label="facebook page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <path fill="#1877f2"
                                d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445" />
                            <path fill="#fff"
                                d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/digiton_agency/" aria-label="Instagram page link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 256">
                            <g fill="none">
                                <rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60" />
                                <rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60" />
                                <path fill="#fff"
                                    d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396c0 26.688-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413c0-26.704.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5c3.5-3.5 6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355c0 28.361 22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334c-18.41 0-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334" />
                                <defs>
                                    <radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fd5" />
                                        <stop offset=".1" stop-color="#fd5" />
                                        <stop offset=".5" stop-color="#ff543e" />
                                        <stop offset="1" stop-color="#c837ab" />
                                    </radialGradient>
                                    <radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1"
                                        gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#3771c8" />
                                        <stop offset=".128" stop-color="#3771c8" />
                                        <stop offset="1" stop-color="#60f" stop-opacity="0" />
                                    </radialGradient>
                                </defs>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@INTERCOCINA4079" aria-label="youtube channel link">
                        <svg class="duration-500 hover:scale-125" xmlns="http://www.w3.org/2000/svg" width="30px"
                            height="30px" viewBox="0 0 256 180">
                            <path fill="#f00"
                                d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134" />
                            <path fill="#fff" d="m102.421 128.06l66.328-38.418l-66.328-38.418z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

    </div>

</footer>
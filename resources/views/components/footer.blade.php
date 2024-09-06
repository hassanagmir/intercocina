        
<footer class="px-4 pb-10 mt-24 overflow-hidden md:max-w-7xl md:mx-auto">
    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-4 xl:col-span-1 col-span-full" x-animate.intersect="fadeInRight">
                <img class="w-[200px]" loading="lazy" src="/assets/imgs/intercocina-logo.png" alt="">
                <p class="text-slate-500 md:max-w-[400px]">
                    Nous sommes profondément honorés de vous présenter notre société, qui se distingue en tant que leader incontesté dans le domaine de la fabrication sur mesure d’éléments de cuisine
                </p>
            </div>
            <div
                class="flex flex-col items-stretch gap-10 my-10 md:flex-row md:justify-center md:py-24 md:my-0 xl:col-span-1 col-span-full">
                <div class="flex items-center gap-3 px-6 py-3 duration-500 shadow-lg bg-accent-red-500 rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="/assets/icons/mail.png" alt="">
                    <div>
                        <p class="text-lg font-bold text-white ">Envoyez-nous un email</p>
                        <p class="text-white">hello@intercocina.com</p>
                    </div>

                </div>
                <div class="flex items-center gap-3 px-6 py-3 duration-500 bg-white shadow-lg rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" src="/assets/icons/phone.png" alt="">
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
                <h4 class="py-6 text-lg text-accent-red">Pages</h4>
                <div class="flex gap-10">
                    <ul class="space-y-5">
                        <li class="text-slate-500 hover:text-accent-red">
                            <a href="/">Accueil</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-red">
                            <a href="/notre-processus">Notre Approche</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-red">
                            <a href="/case-studies">Case studies</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-red">
                            <a href="/portfolio">Portfolio</a>
                        </li>
                        <li class="text-slate-500 hover:text-accent-red">
                            <a href="/a-propos">À propos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <h4 class="py-6 text-lg text-accent-red">Ressources</h4>

                <ul class="space-y-5">
                    <li class="text-slate-500 hover:text-accent-red"><a href="/formation">Formation</a>
                    </li>
                    <li class="text-slate-500 hover:text-accent-red">Podcast</li>
                    <li class="text-slate-500 hover:text-accent-red">Privacy policy</li>
                </ul>

            </div>

        </div>

        <div wire:snapshot="{&quot;data&quot;:{&quot;email&quot;:&quot;&quot;,&quot;emailSent&quot;:false},&quot;memo&quot;:{&quot;id&quot;:&quot;kKEOmOQ5b5WFFtONVTU8&quot;,&quot;name&quot;:&quot;newsletterform&quot;,&quot;path&quot;:&quot;\/&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;en&quot;},&quot;checksum&quot;:&quot;b938cf710e9a4661db4035480c6283b38128fcce0860e81748010d93b05134c0&quot;}" wire:effects="[]" wire:id="kKEOmOQ5b5WFFtONVTU8"
    class="w-full max-w-lg bg-accent-red px-8 py-16 xl:ml-36 rounded-3xl relative overflow-hidden order-1 xl:order-2 md:flex md:justify-center">
    <div class="w-40 aspect-square rounded-full bg-accent-gray absolute z-0 -bottom-10 -left-10" x-animate.intersect="zoomIn"></div>
    <div class="w-40 aspect-square rounded-full bg-accent-gray w-36 md:w-80 absolute z-0 -top-16 -right-16 md:-top-28 md:-right-28" x-animate.intersect="zoomIn"></div>

    <div class="w-full relative z-20 space-y-6">
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
</div>

            <button class="flex items-center justify-center gap-2 text-accent-red bg-white px-6 py-3 rounded-xl font-semibold hover:bg-accent-red hover:bg-transparent border hover:border-white hover:text-white" wire:click="subscribe" label="Subscribe">

    <svg wire:loading xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
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
                    {{ __("Nous respectons votre vie privée. Vous pouvez vous désinscrire à tout moment") }}.
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
                    <a href="https://ma.linkedin.com/company/intercocina" aria-label="Linkedin page link">
                        <img src="/assets/media-icons/linkedin.png" width="30px" alt="Linkedin page link">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/intercocina" aria-label="facebook page link">
                        <img src="/assets/media-icons/facebook.png" width="30px" alt="Facebook page link">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/intercocina" aria-label="Instagram page link">
                        <img src="/assets/media-icons/instagram.png" width="30px" alt="Instagram page link">
                    </a>
                </li>
                <li>
                    <a href="https://www.youtube.com/@intercocina" aria-label="youtube channel link">
                        <img src="/assets/media-icons/youtube.png" width="30px" alt="youtube channel link">
                    </a>
                </li>

                <li>
                    <a href="https://www.x.com/intercocina" aria-label="X channel link">
                        <img src="/assets/media-icons/youtube.png" width="30px" alt="X link">
                    </a>
                </li>

                <li>
                    <a href="https://www.x.com/intercocina" aria-label="X channel link">
                        <img src="/assets/media-icons/twitter.png" width="30px" alt="X link">
                    </a>
                </li>
            </ul>
        </div>

    </div>

</footer>
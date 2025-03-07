<footer class="px-4 pb-10 mt-24 overflow-hidden md:max-w-7xl md:mx-auto">
    <section>
        <div class="grid grid-cols-2">
            <div class="space-y-4 xl:col-span-1 col-span-full" x-animate.intersect="fadeInRight">
                <img class="w-[200px]" width="200px" height="200px" loading="lazy" src="/assets/imgs/intercocina-logo.png" alt="Intercocina Logo" title="Intercocina Logo">
                <p class="text-slate-700 font-semibold md:max-w-[400px]">
                    Nous sommes profondément honorés de vous présenter notre société, qui se distingue en tant que
                    leader incontesté dans le domaine de la fabrication sur mesure d’éléments de cuisine
                </p>
            </div>
            <div
                class="flex flex-col items-stretch gap-10 my-10 md:flex-row md:justify-center md:py-24 md:my-0 xl:col-span-1 col-span-full">
                <div class="flex items-center gap-3 px-6 py-3 duration-500 shadow-lg bg-accent-red-500 rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" loading="lazy" width="40px" height="40px" src="/assets/icons/mail.png" alt="Envoyez-nous un email" title="Envoyez-nous un email">
                    <div>
                        <p class="text-lg font-bold text-white ">Envoyez-nous un email</p>
                        <p class="text-white">contact@intercocina.com</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 px-6 py-3 duration-500 bg-white shadow-lg rounded-3xl hover:scale-105"
                    x-animate.intersect="fadeInLeft">
                    <img class="w-[40px]" width="40px" height="40px" loading="lazy" src="/assets/icons/phone.png" title="Appelez-nous" alt="Appelez-nous">
                    <div>
                        <p class="text-lg font-bold ">Appelez-nous</p>
                        <p>+212 661 54 79 00</p>
                        <p>+212 536 35 88 88</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="h-px my-10 bg-gray-200 border-0">
    <section class="flex flex-col gap-16 mb-8 lg:flex-row lg:justify-between">
        <div class="flex justify-around order-2 gap-10 xl:order-1">
            <div class="flex flex-col">
                <h3 class="py-6 text-lg text-accent-red font-semibold">Pages</h3>
                <div class="flex gap-10">
                    <ul class="space-y-5">
                        <li class="text-slate-700 font-semibold hover:text-accent-red">
                            <a href="{{ route('products') }}">Produits</a>
                        </li>
                        <li class="text-slate-700 font-semibold hover:text-accent-red">
                            <a href="{{ route('post.index') }}">Blog</a>
                        </li>
                        <li class="text-slate-700 font-semibold hover:text-accent-red">
                            <a href="{{ route('event.list') }}">Événements</a>
                        </li>
                        <li class="text-slate-700 font-semibold hover:text-accent-red">
                            <a href="#">Politique de confidentialité</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col">
                <h3 class="py-6 text-lg text-accent-red font-semibold">Ressources</h3>
                <ul class="space-y-5">
                    <li class="text-slate-700 font-semibold hover:text-accent-red">
                        <a href="{{ route("about") }}">À propos</a>
                    </li>
                    <li class="text-slate-700 font-semibold hover:text-accent-red">
                        <a href="{{ route('contact') }}">Contactez-nous</a>
                    </li>
                    <li class="text-slate-700 font-semibold hover:text-accent-red">
                        <a href="{{ route('faqs' )}}">FAQs</a>
                    </li>
                    <li class="text-slate-700 font-semibold hover:text-accent-red">
                        <a href="{{ route('claim.create' )}}">Réclamation</a>
                    </li>
                   
                </ul>
            </div>

        </div>
        @livewire('subscribe-form')
    </section>
    <hr class="h-px bg-gray-200 border-0">
    <div class="flex flex-col items-center gap-8 pt-8 md:justify-between lg:flex-row">
        <p class="text-center text-slate-700 md:text-left font-semibold">
            Copyright © INTERCOCINA 2025. All rights reserved. Made with ❤️ in Nador.
        </p>
        <div>
            <ul class="flex items-center gap-4">
                <li>
                    <a href="https://www.linkedin.com/company/inter-cocina" target="__blank" aria-label="Linkedin page link">
                        <img src="/assets/media-icons/linkedin.png" width="30px" height="30px" loading="lazy" title="Linkedin page link"  alt="Linkedin page link">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/IntercocinaSARL" target="__blank" aria-label="facebook page link">
                        <img src="/assets/media-icons/facebook.png" width="30px" height="30px" loading="lazy" title="Facebook page link" alt="Facebook page link">
                    </a>
                </li>
                <li>
                    <a href="https://www.instagram.com/intercocinasarl" target="__blank" aria-label="Instagram page link">
                        <img src="/assets/media-icons/instagram.png" width="30px" height="30px" loading="lazy" title="Instagram page link" alt="Instagram page link">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
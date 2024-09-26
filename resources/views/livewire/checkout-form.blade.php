<div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
    <p class="text-xl font-semibold text-gray-900">{{ __("Sélectionnez ou ajoutez une adresse") }}</p>
    @error('address')
    <div class="text-red-600 font-bold">{{ $message }}</div>
    @enderror
    <ul class="grid w-full">
        @foreach ($addresses as $address)
        <li class="mb-3">
            <input type="radio" value="{{ $address->id }}" wire:model='address' id="address-{{ $address->id }}" name="hosting" value="hosting-small" class="hidden peer" required />
            <label for="address-{{ $address->id }}" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">                           
                <div class="block">
                    <div class="w-full text-lg font-semibold">{{ $address->first_name }} {{ $address->last_name }} ({{ $address->phone }})</div>
                    <div class="w-full">{{ $address->address_name }}, {{ $address->city->name }}</div>
                </div>
                <svg class="w-5 h-5 ms-3 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </label>
        </li> 
        @endforeach

        <li>
            <div class="flex items-center justify-center w-full">
              @auth
              <div x-data="{ showModal: false }" class="w-full" @keydown.escape.window="showModal = false">
                <!-- Trigger for Modal -->
                <button type="button" @click="showModal = true" class="text-md flex flex-col mt-3 items-center justify-center w-full py-3 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 font-bold">
                    <div class="flex gap-3">
                        <svg class="text-gray-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                        </svg>
                        <span class="text-gray-600">{{__("Ajouter une adresse")}}</span>
                    </div>
                </button>
            
                <!-- Modal -->
                <div
                    class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50"
                    x-show="showModal"
                    x-cloak
                    role="dialog"
                    aria-labelledby="modalTitle"
                    x-transition:enter="motion-safe:ease-out duration-300" 
                    x-transition:enter-start="opacity-0 scale-90" 
                    x-transition:enter-end="opacity-100 scale-100"
                    @click.away="showModal = false"
                >
                    <!-- Modal inner -->
                    <div class="max-w-3xl px-6 py-4 mx-auto text-left bg-white rounded shadow-lg" style="min-width: 50%!important">
                        <!-- Title / Close -->
                        <div class="flex items-center justify-between">
                            <h5 class="mr-3 text-black max-w-none text-2xl font-semibold" id="modalTitle">Nouvelle adresse</h5>
            
                            <button type="button" class="z-50 cursor-pointer" @click="showModal = false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
            
                        <!-- Content -->
                        @livewire('address-form')
                    </div>
                </div>
            </div>
            
              @endauth

              @guest
              <button  x-on:click="$dispatch('open-contact-form-modal')" type="button" class="text-md flex flex-col mt-3 items-center justify-center w-full py-3 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 font-bold">
                  <div class="flex gap-3">
                      <svg class="text-gray-600" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M9 12h6" /><path d="M12 9v6" /></svg>
                      <span class="text-gray-600">{{__("Ajouter une adresse")}}</span>
                  </div>
              </button>
              @endguest
               
            </div> 
        </li>
    </ul>

    <div class="space-y-4">
      <div class="space-y-2">
        <dl class="flex items-center justify-between gap-4">
          <dt class="text-base font-normal text-gray-500">{{ _("Prix d'origine")}}</dt>
          <dd class="text-base font-bold text-gray-900">{{ \Cart::getTotal() }} MAD</dd>
        </dl>

        <dl class="flex items-center justify-between gap-4">
          <dt class="text-base font-normal text-gray-500">{{ _("Livraison")}}</dt>
          <dd class="text-base font-bold text-gray-900">0.0 MAD</dd>
        </dl>

        <dl class="flex items-center justify-between gap-4">
          <dt class="text-base font-normal text-gray-500">{{ __("Taxe") }}</dt>
          <dd class="text-base font-bold text-gray-900">0.0 MAD</dd>
        </dl>
      </div>

      <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
        <dt class="text-base font-bold text-gray-900">{{ __("Total") }}</dt>
        <dd class="text-xl font-black text-gray-900">{{ \Cart::getTotal() }} MAD</dd>
      </dl>
    </div>

    <div class="flex justify-end">
      <button wire:loading.attr='disabled' wire:click='save()' type="button" class="btn btn-primary gap-2 text-center flex items-start justify-center">
        <span> {{ __("Envoyer la commande") }}
          <svg wire:loading xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path wire:loading.class="animate-rotate" d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"/>
            <path wire:loading.class="animate-rotate-reverse" d="M17 12a5 5 0 1 0 -5 5"/>
          </svg>
        </span>

        <svg wire:loading.remove class="h-5 w-5 mt-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
        </svg>
    </button>
    </div>
</div>

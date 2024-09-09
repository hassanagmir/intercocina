<div>
    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-2 mt-3 rounded">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent='submit' class="space-y-6">
        @csrf
        <div class="flex w-full gap-3">
            <x-input lable="Nom" wire:model='last_name' name="last_name" class="w-full" />
            <x-input lable="Prénom" wire:model='first_name' name="first_name" class="w-full" />
        </div>

        <div class="flex w-full gap-3">
            <x-input lable="Téléphone" wire:model='phone' name="phone" class="w-full" />
            <x-input lable="E-mail" name="email" wire:model='email' class="w-full" />
        </div>

        <div class="">
            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="countries" wire:model='city' class="border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500">
              <option selected>Choisissez une ville</option>
              @foreach ($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
            @error('city')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="">
            <x-input lable="Adresse" name="address_name" wire:model='address_name' class="w-full" />
        </div>
        <div>
            <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                {{ _("Créer") }}
            </button>
        </div>
    </form>
</div>
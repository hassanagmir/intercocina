<div class="bg-white mx-auto p-6 rounded-lg shadow-sm w-full">
    <h1 class="text-2xl font-black text-gray-700 mb-3">{{__("Modifier le profil")}}</h1>
    <div>
        @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
            <p>{{ session('message') }}</p>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="p-2 rounded-md bg-red-400 text-white mb-2">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form wire:submit.prevent="updateProfile" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="first_name" class="block text-dm font-semibold text-gray-700">{{__("Prénom")}}</label>
                    <input type="text" id="first_name" maxlength="100" wire:model="first_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('first_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="last_name" class="block text-dm font-semibold text-gray-700">{{__("Nom")}}</label>
                    <input type="text" id="last_name" maxlength="100" wire:model="last_name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('last_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="name" class="block text-dm font-semibold text-gray-700">{{ __("Entreprise")}}</label>
                    <input type="name" id="name" maxlength="150" wire:model="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-dm font-semibold text-gray-700">{{ __("E-mail")}}</label>
                    <input type="email" maxlength="155" id="email" wire:model="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="phone" class="block text-dm font-semibold text-gray-700">{{__("Téléphone")}}</label>
                    <input type="text" maxlength="50" id="phone" wire:model="phone" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="address" class="block text-dm font-semibold text-gray-700">{{__("Adresse")}}</label>
                    <input type="text" maxlength="155" id="address" wire:model="address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="shipping" class="block text-dm font-semibold text-gray-700">{{ __("Expédition") }}</label>
                    <select id="shipping" wire:model="shipping" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                        @foreach ($shippings as $shipping)
                            <option value="{{ $shipping->id }}">{{ $shipping->name }}</option>
                        @endforeach
                    </select>
                    @error('shipping') <span class="text-red-600 text-sm">{{ $shipping }}</span> @enderror
                </div>

                <div>
                    <label for="gender" class="block text-dm font-semibold text-gray-700">{{ __("Genre") }}</label>
                    <select id="gender" wire:model="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                        <option value="">Sélectionner</option>
                        <option value="Mâle">Mâle</option>
                        <option value="Femelle">Femelle</option>
                    </select>
                    @error('gender') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="image" class="block text-dm font-semibold text-gray-700">Image de profil</label>
                    <input type="file" id="image" wire:model="image" accept=".jpg,.jpeg,.png,.gif,.svg" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-red-500 focus:border-red-500">
                    @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

                    @if ($image)
                        <img src="{{ $image->temporaryUrl() }}" alt="{{__("Aperçu de l'image de profil")}}" class="mt-2 w-20 h-20 rounded-full object-cover">
                    @endif

                    @if ($user->image && !$image)
                        <img src="{{ url(config('app.storage'), $user->image) }}" alt="{{__("Image de profil actuelle")}}" class="mt-2 w-20 h-20 rounded-full object-cover">
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" wire:target='updateProfile' class="max-w-xl bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-200">
                    <svg wire:loading aria-hidden="true" role="status" class="inline w-4 h-4 me-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>

                    {{ __("Enregistré") }}
                </button>
            </div>
        </form>
    </div>
</div>

@extends('layouts.dash')


@section('content')
    
<div class="relative overflow-x-auto shadow-sm sm:rounded-lg text-gray-500 bg-gray-50">
    @if (session()->has('message'))
    <div class="bg-green-500 text-white p-2 m-3 rounded">
        {{ session('message') }}
    </div>
    @endif
    <div class="sm:flex flex-initial justify-between">
    <h1 class="pt-3 px-5 text-xl font-semibold w-full">Vos adresses</h1>
    <div x-data="{ showModal: false }" class="w-full" @keydown.escape.window="showModal = false">
        <!-- Trigger for Modal -->
        <button type="button" @click="showModal = true" class="text-md float-end m-2 flex flex-col items-center justify-center py-3 px-4 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 font-bold">
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
    </div>
</div>
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><circle cx="12" cy="9.1" r="2.5"/><circle cx="12" cy="12" r="9"/><path d="M17 19.2c-.317-6.187-9.683-6.187-10 0"/></g></svg>
                    {{ __("Nom et prénom") }}
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.77 8.515c2.23-1.812 5.444-.845 5.823 2.135c.403 3.163-.4 5.67-3.52 5.67c-2.895 0-2.806-2.52-2.806-2.52c0-2.7 4.589-3.06 7.262-1.71c4.9 3.15 1.336 8.91-4.01 8.91C8.09 21 4.5 18.75 4.5 12s3.59-9 8.02-9c3.125 0 5.944 1.626 6.98 4.879"/></svg>
                        <span>{{ __("E-mail") }}</span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.6 14.522c-2.395 2.52-8.504-3.534-6.1-6.064c1.468-1.545-.19-3.31-1.108-4.609c-1.723-2.435-5.504.927-5.39 3.066c.363 6.746 7.66 14.74 14.726 14.042c2.21-.218 4.75-4.21 2.214-5.669c-1.267-.73-3.008-2.17-4.342-.767"/></svg>
                        <span>{{ __("Téléphone") }}</span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64"/><path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></g></svg>
                        <span>{{ __("Address") }}</span>
                    </div>
                    
                </th>
                <th scope="col" class="px-6 py-3 flex items-center gap-1"> </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($addresses as $address)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $address->first_name }} {{ $address->last_name }}
                </th>
                <td class="px-6 py-4 font-medium">
                    {{ $address->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $address->phone }}
                </td>
                <td class="px-6 py-4">
                    {{ $address->address_name}}
                </td>
                <td class="flex items-center px-6 py-4">
                    <a onclick="return confirm('Etes-vous sûr de vouloir supprimer cette adresse')" href="{{ route('address.delete', $address->id ) }}" class="font-medium text-red-600 ms-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m18 9l-.84 8.398c-.127 1.273-.19 1.909-.48 2.39a2.5 2.5 0 0 1-1.075.973C15.098 21 14.46 21 13.18 21h-2.36c-1.279 0-1.918 0-2.425-.24a2.5 2.5 0 0 1-1.076-.973c-.288-.48-.352-1.116-.48-2.389L6 9m7.5 6.5v-5m-3 5v-5m-6-4h4.615m0 0l.386-2.672c.112-.486.516-.828.98-.828h3.038c.464 0 .867.342.98.828l.386 2.672m-5.77 0h5.77m0 0H19.5"/></svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
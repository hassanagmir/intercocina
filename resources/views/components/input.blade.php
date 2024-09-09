<div class="w-full">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">{{ $lable }} </label>
    <input type="text" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => "mt-1 block w-full px-3 py-2 border-2 border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm"]) }}>
    @error($name)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
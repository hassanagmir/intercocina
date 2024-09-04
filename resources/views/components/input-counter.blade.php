<div x-data="{ quantity: 1 }" x-modelable="quantity" class="flex items-center justify-center border border-gray-400 rounded-full">
    <button @click="if (quantity > 1) quantity--" class="group text-3xl py-2 px-3 w-full border-r border-gray-400 rounded-l-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
        -
    </button>
    <input type="text" placeholder="0" x-model="quantity" class="font-semibold text-gray-900 text-lg py-3 px-2 w-full min-[400px]:min-w-[75px] h-full bg-transparent placeholder:text-gray-900 text-center hover:text-red-600 outline-0 hover:placeholder:text-red-600">
    <button @click="quantity++" class="group text-3xl py-2 px-3 w-full border-l border-gray-400 rounded-r-full h-full flex items-center justify-center bg-white shadow-sm shadow-transparent transition-all duration-300 hover:bg-gray-50 hover:shadow-gray-300">
        +
    </button>
</div>
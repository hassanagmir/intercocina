
<div>
    <div class="flex flex-col w-full leading-1.5 p-4 border-gray-200 bg-gray-100 rounded-e-xl rounded-es-xl dark:bg-gray-700">
        <div class="flex items-center space-x-2 rtl:space-x-reverse">
            <span class="text-sm font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 13.826a3.506 3.506 0 1 0 0-7.013a3.506 3.506 0 0 0 0 7.013m0 0a6 6 0 0 1 5.953 5.254M12 13.826a6 6 0 0 0-5.953 5.254m0 0A9.2 9.2 0 0 0 12 21.25a9.2 9.2 0 0 0 5.953-2.17m-11.906 0a9.25 9.25 0 1 1 11.907 0"/></svg>
                {{ $record->full_name }}
            </span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">{{ $record->created_at->format("d, M y - H:i") }}</span>
        </div>
        <h3 class="text-md font-normal text-gray-900 dark:text-white mt-3 px-6">({{ $record->subject }})</h3>
        <p class="text-sm font-normal py-2.5 text-gray-900 dark:text-white mb-3 px-6" style="white-space: pre-line">
            {{ $record->message }}
        </p>
        <div class="flex gap-4 mt-2">
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 space-x-2 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-width="1.5" d="M8.14 15.733c2.158 2.158 4.278 3.28 5.89 3.864c1.768.64 3.606-.117 4.935-1.446l.459-.458a1.5 1.5 0 0 0 0-2.122l-1.149-1.149a1.5 1.5 0 0 0-2.121 0l-.387.387a2 2 0 0 1-2.828 0l-3.713-3.712a2 2 0 0 1 0-2.829l.387-.387a1.5 1.5 0 0 0 0-2.12l-1.15-1.15a1.5 1.5 0 0 0-2.12 0l-.572.572c-1.262 1.262-2.013 2.99-1.438 4.68c.538 1.58 1.622 3.685 3.806 5.87Z"/></svg>
                <a href="tel:{{ $record->phone }}">{{ $record->phone }}</a>
            </span>
            <span class="text-sm font-normal text-gray-500 dark:text-gray-400 space-x-2 flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="15.5" x="2.75" y="4.25" rx="3"/><path d="m2.75 8l8.415 3.866a2 2 0 0 0 1.67 0L21.25 8"/></g></svg>
                <a href="mailto:{{ $record->email }}">{{ $record->email }}</a>
            </span>
        </div>
        
        </div>
</div>

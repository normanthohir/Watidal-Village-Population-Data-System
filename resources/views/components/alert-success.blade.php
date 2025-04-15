<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
    class="fixed inset-0 flex items-end justify-center px-2 py-6 pointer-events-none sm:p-6 sm:items-start sm:justify-end mt-10 z-50">
    <div x-show="show" x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-y-2 sm:translate-y-0 sm:translate-x-2"
        class="max-w-sm w-full bg-white shadow-lg rounded-md pointer-events-auto border-b-4 border-green-300">
        <div class="rounded-lg shadow-xs overflow-hidden">
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 bg-green-400 rounded-full ">
                        <svg class="h-5 w-5 p-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div class="ml-3 w-0 flex-1 ">
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-900">{{ $message }}</p>
                    </div>
                    <div class="ml-4 items-start -mt-2 flex-shrink-0 flex">
                        <button @click="show = false"
                            class="inline-flex text-gray-800 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M14.293 5.293a1 1 0 0 1 1.414 1.414L11.414 10l4.293 4.293a1 1 0 1 1-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 1 1-1.414-1.414L8.586 10 4.293 5.707a1 1 0 0 1 1.414-1.414L10 8.586l4.293-4.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

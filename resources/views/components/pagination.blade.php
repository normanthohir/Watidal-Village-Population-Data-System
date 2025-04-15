<!-- resources/views/components/pagination.blade.php -->
<nav class="flex items-center text-center flex-col flex-wrap md:flex-row  md:justify-between py-4 pb-2" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">
        Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
        to <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
        of <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
    </span>
    <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
        {{-- Tombol "Previous" --}}
        <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}" aria-disabled="{{ $paginator->onFirstPage() ? 'true' : 'false' }}">
            <a href="{{ $paginator->previousPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Previous
            </a>
        </li>

        {{-- Loop untuk menampilkan halaman-halaman pagination --}}
        @php
            $maxPages = min($paginator->lastPage(), 7); // Batasan jumlah halaman yang ditampilkan
            $startPage = max(1, $paginator->currentPage() - 3); // Halaman pertama yang ditampilkan
            $endPage = min($paginator->currentPage() + 3, $paginator->lastPage()); // Halaman terakhir yang ditampilkan
        @endphp
        @for ($i = $startPage; $i <= $endPage; $i++)
            <li>
                <a href="{{ $paginator->url($i) }}"
                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white {{ $paginator->currentPage() === $i ? 'text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:text-white' : '' }}">
                    {{ $i }}
                </a>
            </li>
        @endfor

        {{-- Tombol "Next" --}}
        <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}" aria-disabled="{{ $paginator->hasMorePages() ? 'false' : 'true' }}">
            <a href="{{ $paginator->nextPageUrl() }}"
                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
            </a>
        </li>
    </ul>
</nav>

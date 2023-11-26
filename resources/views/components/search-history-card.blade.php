@props(['searchHistory'])

<div class="max-w-sm mx-auto bg-white flex justify-center items-center rounded-xl border shadow-md overflow-hidden m-3">
    <div class="p-8">
        <div class="flex justify-between gap-20 items-center">
            <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Search Term:</span>
            <span>{{ $searchHistory->search_term }}</span>
        </div>
        <div class="flex justify-between gap-20 items-center mt-2">
            <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Date:</span>
            <span>{{ $searchHistory->search_date->format('F j, Y') }}</span>
        </div>
        <div class="mt-4 text-right">
            <a href="{{ route('search', ['searchterm' => $searchHistory->search_term]) }}"
                class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Repeat Search</a>
        </div>
    </div>
</div>

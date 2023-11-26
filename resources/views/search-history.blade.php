<x-app-layout>


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                    <h2 class = "text-3xl font-bold pb-10">Search history:</h2>
                    @if (session('success'))
                        <div class="text-green-600 font-semibold px-4 py-6 rounded-md border">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($searchHistories->count() > 0)
                        @foreach ($searchHistories as $searchHistory)
                            <div class="w-full flex justify-around p-0">

                                <x-search-history-card :searchHistory="$searchHistory" />
                                @if ($searchHistory->vehicle)
                                    <x-vehicle-card :vehicle="$searchHistory->vehicle" />
                                @else
                                    <div
                                        class="max-w-md px-[4.5rem] mx-auto bg-white flex items-center justify-center rounded-xl border shadow-md overflow-hidden m-3">
                                        <p class="text-center">No vehicle found with that license plate.</p>
                                    </div>
                                @endif
                            </div>
                            <x-separator />
                        @endforeach
                    @else
                        <p class="text-center">No search history found.</p>
                    @endif
                </div>
                {{ $searchHistories->links() }}
            </div>
    @endif
</x-app-layout>

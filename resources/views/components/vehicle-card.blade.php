@props(['vehicle'])

<div class="max-w-md mx-auto bg-white rounded-xl border shadow-md overflow-hidden md:max-w-2xl m-3">
    <div class="md:flex">
        <div class="md:flex-shrink-0">
            <img class="h-48 w-full object-cover md:w-48" src="{{ $vehicle->img_url }}" alt="{{ $vehicle->model }}">
        </div>
        <div class="p-8 w-full">
            <div class="flex justify-between items-center">
                <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Brand:</span>
                <span>{{ $vehicle->brand }}</span>
            </div>
            <div class="flex justify-between items-center mt-2">
                <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Model:</span>
                <span>{{ $vehicle->model }}</span>
            </div>
            <div class="flex justify-between items-center mt-2">
                <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Year:</span>
                <span>{{ $vehicle->year }}</span>
            </div>
            <div class="flex justify-between items-center mt-2">
                <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">License plate:</span>
                <span>{{ $vehicle->license_plate }}</span>
            </div>
            @if (auth()->user() && auth()->user()->isAdmin)
                <div class="flex justify-end items-center mt-2">
                    <a href="{{ route('vehicle.editForm', $vehicle) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Edit Vehicle
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

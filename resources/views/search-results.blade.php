<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search results') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="text-green-600 font-semibold px-4 py-6 rounded-md border">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        @if ($vehicle)
                            <div class="">
                                <h2 class="text-3xl font-bold pb-10">Vehicle:</h2>
                                <x-vehicle-card :vehicle="$vehicle" />
                                <x-separator />
                                <h2 class="text-3xl font-bold pb-10">Vehicle damage events:</h2>
                                @if ($vehicle->vehicleDamageEvents->count() > 0)
                                    @foreach ($vehicle->vehicleDamageEvents as $damageEvent)
                                        <x-damage-event-card :damageEvent="$damageEvent" />
                                    @endforeach
                                @else
                                    <p class="text-center">No damage events found.</p>
                                @endif
                            </div>
                        @else
                            <p class="text-center">No vehicles found.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

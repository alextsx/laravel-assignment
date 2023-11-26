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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-3xl font-bold pb-10">Damage event:</h2>
                        <x-damage-event-card :damageEvent="$vehicleDamageEvent" :showDetailsBtn="false" />
                        <x-separator />
                        <h2 class="text-3xl font-bold pb-10">Vehicles involved:</h2>
                        @if ($vehicleDamageEvent->vehicles->count() > 0)
                            @foreach ($vehicleDamageEvent->vehicles as $vehicle)
                                <x-vehicle-card :vehicle="$vehicle" />
                            @endforeach
                        @else
                            <p class="text-center">No vehicles found.</p>
                        @endif
                    </div>
                </div>
            </div>
    @endif
</x-app-layout>

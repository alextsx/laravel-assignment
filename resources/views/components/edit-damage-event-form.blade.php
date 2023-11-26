<div class="py-12 w-full">
    <div class="max-w-2xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-3xl font-bold">Edit damage event:</h2>


            @if (session('success'))
                <div class="text-green-600 font-semibold px-4 py-6 rounded-md border">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="text-red-600 font-semibold px-4 py-6 rounded-md border">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" class="mt-10 flex gap-5 flex-col"
                action="{{ route('damage-event.update', $damageEvent->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="location" :value="__('Location')" />
                    <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
                        :value="old('location', $damageEvent->location)" autofocus />
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="date" :value="__('Date and Time')" />
                    <x-text-input id="date" class="block mt-1 w-full" type="datetime-local" name="date"
                        :value="old('date', $damageEvent->date)" autofocus />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                        :value="old('description', $damageEvent->description)" autofocus />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="vehicles" :value="__('Vehicles')" />
                    <div id="vehicles"
                        class="block mt-1 w-full overflow-auto h-32 border border-gray-300 p-2 rounded-md">
                        @foreach ($attachableVehicles as $vehicle)
                            <div>
                                <input type="checkbox" id="vehicle-{{ $vehicle->id }}" name="vehicles[]"
                                    value="{{ $vehicle->id }}" @if ($attachedVehicles->contains($vehicle->id)) checked @endif>
                                <label for="vehicle-{{ $vehicle->id }}">{{ $vehicle->license_plate }}</label>
                            </div>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('vehicles')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4
                ">
                    <x-primary-button class="ml-4">
                        {{ __('Update Damage Event') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

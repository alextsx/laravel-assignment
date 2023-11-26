{{-- getting vehicle as prop --}}
@props(['vehicle'])

<div class="py-12 w-full">
    <div class="max-w-2xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <form method="POST" class="flex gap-5 flex-col" action="{{ route('vehicle.update', $vehicle) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="license_plate" :value="__('License plate')" />
                    <x-text-input id="license_plate" class="block mt-1 w-full" type="text" disabled
                        :value="$vehicle->license_plate" />
                </div>
                <div>
                    <x-input-label for="brand" :value="__('Brand')" />
                    <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                        :value="old('brand', $vehicle->brand)" autofocus />
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="model" :value="__('Model')" />
                    <x-text-input id="model" class="block mt-1 w-full" type="text" name="model"
                        :value="old('model', $vehicle->model)" autofocus />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="year" :value="__('Year')" />
                    <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                        :value="old('year', $vehicle->year)" autofocus />
                    <x-input-error :messages="$errors->get('year')" class="mt-2" />
                </div>
                <div class="flex justify-between items-center ">
                    <div>
                        <x-input-label for="image" :value="__('Current image')" />
                        <img class="h-48 w-full object-cover md:w-48" src="{{ $vehicle->img_url }}"
                            alt="{{ $vehicle->model }}">
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('New image')" />
                        <input id="image" class="block mt-1 w-full" type="file" name="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                </div>

                @if (isset($error))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                @endif
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Update vehicle') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

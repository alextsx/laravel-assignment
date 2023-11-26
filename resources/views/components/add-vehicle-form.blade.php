<div class="py-12 w-full">
    <div class="max-w-2xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h2 class="text-3xl font-bold">Add vehicle:</h2>
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
            <form method="POST" class="mt-10 flex gap-5 flex-col" action="{{ route('vehicle.create') }}"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <x-input-label for="license_plate" :value="__('License plate')" />
                    <x-text-input id="license_plate" class="block mt-1 w-full" type="text" name="license_plate"
                        :value="old('license_plate')" autofocus />
                    <x-input-error :messages="$errors->get('license_plate')" class="mt-2" />

                </div>
                <div>
                    <x-input-label for="brand" :value="__('Brand')" />
                    <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand"
                        :value="old('brand')" autofocus />
                    <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="model" :value="__('Model')" />
                    <x-text-input id="model" class="block mt-1 w-full" type="text" name="model"
                        :value="old('model')" autofocus />
                    <x-input-error :messages="$errors->get('model')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="year" :value="__('Year')" />
                    <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                        :value="old('year')" autofocus />
                    <x-input-error :messages="$errors->get('year')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <input id="image" class="block mt-1 w-full" type="file" name="image" />
                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Create vehicle') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

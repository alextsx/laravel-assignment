<x-app-layout>
    <div class="pt-20 w-screen flex justify-center items-center">
        <x-edit-damage-event-form :damageEvent="$vehicleDamageEvent" :attachableVehicles="$attachableVehicles" :attachedVehicles="$attachedVehicles" />
    </div>
</x-app-layout>

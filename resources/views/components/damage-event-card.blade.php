@props(['damageEvent', 'showDetailsBtn' => true])

<div class="max-w-md mx-auto bg-white rounded-xl border shadow-md overflow-hidden md:max-w-2xl m-3">
    <div class="p-8 w-full">
        <div class="flex justify-between items-center">
            <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Location:</span>
            <span>{{ $damageEvent->location }}</span>
        </div>
        <div class="flex justify-between items-center mt-2">
            <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Date:</span>
            <span>{{ $damageEvent->date->format('F j, Y') }}</span>
        </div>
        <div class="flex justify-between items-center mt-2">
            <span class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Description:</span>
            <span>{{ $damageEvent->description }}</span>
        </div>
        <div class="mt-4 justify-between items-center flex">
            @if ($showDetailsBtn)
                <a href="{{ route('damage-event', $damageEvent) }}"
                    class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Details</a>
            @endif
            @if (auth()->user() && auth()->user()->isAdmin)
                <a href="{{ route('damage-event.editForm', $damageEvent) }}"
                    class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Edit</a>
                <form method="POST" action="{{ route('damage-event.delete', $damageEvent) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                </form>
            @endif
        </div>
    </div>
</div>

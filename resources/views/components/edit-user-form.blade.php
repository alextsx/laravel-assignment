@props(['user'])

<form method="POST">
    @csrf
    @method('PUT')
    @if (!$user->isPremium)
        <x-primary-button class="ms-3 w-[100px] text-center" formaction="{{ route('user.togglePremium', $user) }}">
            {{ __('Promote') }}
        </x-primary-button>
    @else
        <x-primary-button class="ms-3 text-center" formaction="{{ route('user.togglePremium', $user) }}">
            {{ __('Demote') }}
        </x-primary-button>
    @endif
</form>

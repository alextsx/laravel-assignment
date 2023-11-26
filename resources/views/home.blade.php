    @auth
        <x-app-layout>


            @include('components.content.introduction')
            @include('components.search-form')
        </x-app-layout>
    @else
        <x-intro-guest-layout>
            @include('components.content.introduction')
            @include('components.search-form')
        </x-intro-guest-layout>
    @endauth

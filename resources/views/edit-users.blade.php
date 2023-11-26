<x-app-layout>
    <div class="pt-20 w-screen flex justify-center items-center">
        <div>

            @if (session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif
            <table class="max-w-4xl divide-y divide-gray-200">
                <thead
                    class="bg-gray-50 px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Subscription') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($users->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ __('No users found.') }}</div>
                            </td>
                        </tr>
                    @endif
                    @foreach ($users as $user)
                        <x-user-card :user="$user" />
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>


    </div>
</x-app-layout>

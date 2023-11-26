@props(['user'])

<tr>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $user->name }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $user->email }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $user->isAdmin ? 'Admin' : 'User' }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm text-gray-900">{{ $user->isPremium ? 'Premium' : 'Regular' }}</div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
        <x-edit-user-form :user="$user" />
    </td>
</tr>

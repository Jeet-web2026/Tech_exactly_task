<x-DashboardLayout title="All users" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Login time
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr class="bg-white dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            {{ $user->fname . ' ' . $user->lname }}
                        </th>
                        <td class="px-6 py-4 text-black border-r border-gray-200">
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                        </td>
                        <td class="px-6 py-4 text-black border-r border-gray-200">
                            {{ $user->created_at }}
                        </td>
                        <td class="px-6 py-4 flex flex-row gap-2">
                            <a href="{{ route('admin.users-edit', $user->id) }}" class="bg-blue-700 px-2 py-1 rounded text-white">
                                <i class="ri-edit-box-line text-lg"></i>
                            </a>
                            <a href="{{ route('admin.users-delete', $user->id) }}" class="bg-red-700 px-2 py-1 rounded text-white">
                                <i class="ri-delete-bin-5-line text-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 text-black border-r border-gray-200 text-center" colspan="4">
                            No user found!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-DashboardLayout>
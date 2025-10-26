<x-DashboardLayout title="All posts" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-black dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-white">
                            Creator
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Create time
                        </th>
                        <th scope="col" class="px-6 py-3 text-white">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr class="bg-white dark:bg-gray-100 border-gray-200 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            {{ $post->user->fname . ' ' . $post->user->lname }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 text-black border-r border-gray-200">
                            {{ $post->title }}
                        </th>
                        <td class="px-6 py-4 text-black border-r border-gray-200">
                            {{ $post->content }}
                        </td>
                        <td class="px-6 py-4 text-black border-r border-gray-200 whitespace-nowrap">
                            {{ $post->created_at }}
                        </td>
                        <td class="px-6 py-4 flex flex-row gap-2">
                            <a href="{{ route('admin.users-edit', $post->id) }}" class="bg-green-700 px-2 py-1 rounded text-white">
                                <i class="ri-eye-line text-lg"></i>
                            </a>
                            <a href="{{ route('admin.users-edit', $post->id) }}" class="bg-blue-700 px-2 py-1 rounded text-white">
                                <i class="ri-edit-box-line text-lg"></i>
                            </a>
                            <a href="{{ route('admin.users-delete', $post->id) }}" class="bg-red-700 px-2 py-1 rounded text-white">
                                <i class="ri-delete-bin-5-line text-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white dark:bg-gray-100 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4 text-black border-r border-gray-200 text-center" colspan="4">
                            No post found!
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="flex justify-start items-center mt-3">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-DashboardLayout>
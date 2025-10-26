<x-DashboardLayout title="{{ $post->title }}" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="bg-gray-200 p-5 rounded shadow-md">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded mb-4">
            <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
            <p class="text-gray-800 mb-4">{{ $post->content }}</p>
            <p class="text-sm text-gray-600 dark:text-gray-400">Created by: {{ $post->user->fname . ' ' . $post->user->lname }} on {{ $post->created_at }}</p>
        </div>
    </div>
</x-DashboardLayout>
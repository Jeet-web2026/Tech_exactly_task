<x-DashboardLayout title="{{ $post->title }}" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="bg-gray-200 p-5 rounded shadow-md">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded mb-4">
            <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
            <p class="text-gray-800 mb-4">{{ $post->content }}</p>
            <p class="text-sm text-gray-700"><i class="ri-user-3-line"></i> {{ $post->user?->fname ?? 'Unknown' }} {{ $post->user?->lname ?? '' }} on <i class="ri-calendar-check-line"></i> {{ $post->created_at }}</p>
            <p class="capitalize mt-2 mb-3">Status: 
                @if($post->status === 'active')
                <span class="text-green-800">{{ $post->status }}</span>
                @else
                <span class="text-red-800">{{ $post->status }}</span>
                @endif
            </p>
            <a href="{{ route('admin.posts') }}" class="text-white bg-gray-600 px-3 py-2 text-base rounded"><i class="ri-arrow-left-long-line me-1"></i>Back</a>
        </div>
    </div>
</x-DashboardLayout>
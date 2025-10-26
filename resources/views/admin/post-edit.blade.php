<x-DashboardLayout title="{{ $post->title }}" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="bg-gray-200 p-5 rounded shadow-md">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded mb-4">
            <h2 class="text-2xl font-semibold mb-4">{{ $post->title }}</h2>
            <p class="text-gray-800 mb-4">{{ $post->content }}</p>
            <p class="text-sm text-gray-700"><i class="ri-user-3-line"></i> {{ $post->user->fname . ' ' . $post->user->lname }} on <i class="ri-calendar-check-line"></i> {{ $post->created_at }}</p>
            <div class="flex flex-row items-center gap-2 mt-3">
                <form action="{{ route('admin.users-post-update', ['uid' => $post->id, 'slug' => $post->slug]) }}" class="w-1/2" method="post">
                    @csrf
                    <select id="status" name="status" class="block w-full p-2 border rounded text-black border-gray-400 outline-none" onchange="this.form.submit()">
                        <option value="active" @if($post->status === 'active') selected @endif>Active</option>
                        <option value="inactive" @if($post->status === 'inactive') selected @endif>Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </form>
                <a href="{{ route('admin.posts') }}" class="text-white bg-gray-600 px-3 py-2 text-base rounded"><i class="ri-arrow-left-long-line me-1"></i>Back</a>
            </div>
        </div>
    </div>
</x-DashboardLayout>
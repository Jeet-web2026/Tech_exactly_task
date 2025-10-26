<x-DashboardLayout title="Admin dashboard" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
        <a href="{{ route('admin.users') }}">
            <div class="shadow-md border border-gray-200 p-5 rounded">
                <h3 class="text-xl font-semibold"><i class="ri-user-3-line me-2"></i>Total Users</h3>
                <h2 class="text-3xl font-semibold">{{ $user }}</h2>
            </div>
        </a>
        <a href="{{ route('admin.posts') }}">
            <div class="shadow-md border border-gray-200 p-5 rounded">
                <h3 class="text-xl font-semibold"><i class="ri-sticky-note-add-line me-2"></i>Total Posts</h3>
                <h2 class="text-3xl font-semibold">{{ $posts }}</h2>
            </div>
        </a>
        <div class="shadow-md border border-gray-200 p-5 rounded">
            <h3 class="text-xl font-semibold"><i class="ri-edit-2-line me-2"></i>Total Comments</h3>
            <h2 class="text-3xl font-semibold">{{ $comments }}</h2>
        </div>
    </div>
</x-DashboardLayout>
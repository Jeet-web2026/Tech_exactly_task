<aside class="w-1/6 bg-gray-200 h-screen py-5 px-4 shadow relative">
    <ul class="flex flex-col gap-3">
        <a href="{{ route( Auth::user()->user_type . '.' .'dashboard' ) }}" class="flex justify-center items-center">
            <li class="text-black text-6xl bg-black rounded-full p-4 px-7 text-white text-center">{{ Auth::user()->fname[0] }}</li>
        </a>
        <a href="{{ route(Auth::user()->user_type . '.dashboard') }}"
            class="mt-10 
          {{ request()->routeIs(Auth::user()->user_type . '.dashboard') ? 'bg-black text-white' : 'bg-gray-300 text-black' }} 
          py-3 ps-3 rounded">
            <li class="text-lg"><i class="ri-gallery-view-2 me-2"></i>Dashboard</li>
        </a>
        <a href="{{ route(Auth::user()->user_type . '.posts') }}" class="{{ request()->routeIs(Auth::user()->user_type . '.posts') ? 'bg-black text-white' : 'bg-gray-300 text-black' }} py-3 ps-3 rounded">
            <li class="text-lg"><i class="ri-sticky-note-add-line me-2"></i>Posts</li>
        </a>
        <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'bg-black text-white' : 'bg-gray-300 text-black' }} py-3 ps-3 rounded">
            <li class="text-lg"><i class="ri-edit-2-line me-2"></i>Users</li>
        </a>
        <a href="{{ route('signout') }}" class="text-black py-3 ps-3 rounded absolute bottom-0 left-10">
            <li class="text-lg"><i class="ri-shut-down-line me-2"></i>Logout</li>
        </a>
    </ul>
</aside>
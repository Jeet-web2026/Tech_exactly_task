<aside class="w-1/6 bg-gray-200 h-screen py-5 px-4 shadow">
    @if(Auth::user()->user_type == 'admin')
    <p>hi</p>
    @endif
    <ul class="flex flex-col gap-3">
        <a href="{{ route( Auth::user()->user_type . '.' .'dashboard' ) }}" class="flex justify-center items-center">
            <li class="text-black text-4xl bg-black rounded-full p-3 px-5 text-white text-center">{{ Auth::user()->fname[0] }}</li>
        </a>
        <a href="{{ route(Auth::user()->user_type . '.dashboard') }}"
            class="mt-14 
          {{ request()->routeIs(Auth::user()->user_type . '.dashboard') ? 'bg-black text-white' : 'bg-gray-300 text-black' }} 
          py-3 ps-3 rounded">
            <li class="text-lg"><i class="ri-gallery-view-2 me-2"></i>Dashboard</li>
        </a>
        <a href="" class="bg-gray-300 py-3 text-black ps-3 rounded">
            <li class="text-lg"><i class="ri-sticky-note-add-line me-2"></i>Posts</li>
        </a>
        <a href="" class="bg-gray-300 py-3 text-black ps-3 rounded">
            <li class="text-lg"><i class="ri-edit-2-line me-2"></i>Users</li>
        </a>
    </ul>
</aside>
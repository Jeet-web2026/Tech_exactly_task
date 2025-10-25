<header class="fixed w-full top-0 left-0 z-50 bg-gray-50 shadow-md">
    <nav role="navigation" class="py-4 relative max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-center justify-between">
            <a href="/" class="flex flex-row items-center gap-3">
                <img src="{{ asset('assets/images/logo.png') }}" alt="website_logo" class="h-15">
            </a>
            <div role="navigation" class="flex lg:flex-row flex-col items-center gap-2.5 nav-items">
                <div class="flex items-center gap-1 flex-row cursor-pointer">
                    <span class="text-base text-black font-medium">About us</span>
                    <i class="ri-arrow-down-s-line text-lg font-medium text-black"></i>
                </div>
                <a href="">
                    <span class="text-base text-black font-medium">All Blogs</span>
                </a>
                <a href="">
                    <span class="text-base text-black font-medium">Contact</span>
                </a>
                <button type="button" class="ms-2">
                    <i class="ri-search-2-line text-black font-medium"></i>
                </button>
                @guest
                <a href="{{ route('signup') }}" class="ms-2 border px-3 py-1 rounded border-gray-300">
                    <i class="ri-user-3-line text-black"></i>
                    <span class="text-base text-black font-medium">Signup</span>
                </a>
                @endguest
                @auth
                <a href="{{ route('signout') }}" class="ms-2 border px-3 py-1 rounded border-gray-300">
                    <i class="ri-shut-down-line text-black"></i>
                    <span class="text-base text-black font-medium">Signout</span>
                </a>
                <a href="{{ route( Auth::user()->user_type . '.' .'dashboard') }}" class="ms-2 border px-3 py-1 rounded border-gray-300">
                    <span class="text-base text-black font-medium">{{ Auth::user()->fname[0] }}</span>
                </a>
                @endauth
            </div>
            <div class="absolute left-0 top-23 w-full">
                <div class="container mx-auto bg-white h-55 p-5 rounded-b-md nav-items-submenus-tab hidden">
                    <div class="nav-items-submenus hidden" id="courses">
                        <div class="flex lg:flex-row flex-col gap-3">
                            <div class="w-1/4 overflow-hidden">
                                <img src="{{ asset('assets/images/course-img-1.jpg') }}" alt="web-development-course" class="h-45 w-full object-cover rounded shadow-md object-top">
                            </div>
                            <div class="w-3/4 border-l border-gray-300 px-3 h-45 overflow-x-auto">
                                <div class="grid grid-cols-3">
                                    <div class="flex flex-col gap-2.5">
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>software development courses</a>
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>web development courses</a>
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>digital marketing</a>
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>AI/ML courses</a>
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>Automation engineering</a>
                                    </div>
                                    <div class="flex flex-col gap-2.5">
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>Frontend development</a>
                                        <a href="" class="text-[#2E1B7E] capitalize text-base font-medium flex items-center"><i class="ri-book-open-line me-2 text-lg"></i>backend development</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
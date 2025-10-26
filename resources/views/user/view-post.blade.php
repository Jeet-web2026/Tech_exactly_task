<x-BaseComponent tailwindcss="true" title="{{ $post->title }}" remixicon="true" slick="true">
    <main class="w-full bg-gray-200 pt-25 pb-10">
        <section class="max-w-7xl mx-auto bg-white shadow-sm rounded mt-5 p-8">
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-80 rounded shadow mb-3">
            <h2 class="font-semibold text-black text-2xl">{{ $post->title }}</h2>
            <div class="flex flex-row items-center gap-2 mb-3.5 mt-1">
                <i class="ri-user-3-line"></i> {{ $post->user->fname . ' ' . $post->user->lname }}
                <span>|</span>
                <i class="ri-calendar-check-line"></i> {{ $post->created_at }}
                <span>|</span>
                <span class="bg-gray-100 border border-gray-300 px-2 rounded">{{ $post->category }}</span>
            </div>
            <p class="text-base text-gray-800">{!! $post->content !!}</p>
        </section>
        @guest
        <section class="max-w-7xl mx-auto bg-white shadow-sm rounded mt-3 p-8">
            <h3 class="text-center text-2xl font-semibold">You are not signed in!</h3>
            <p class="text-center text-lg font-medium text-gray-400">Signin to continue</p>
            <div class="flex flex-row items-center justify-center mt-2">
                <a href="{{ route('signup') }}" class="px-4 py-1.5 bg-blue-700 text-white rounded flex items-center"><i class="ri-rotate-lock-line me-1 text-xl"></i>Signin now</a>
            </div>
        </section>
        @endguest
    </main>
</x-BaseComponent>
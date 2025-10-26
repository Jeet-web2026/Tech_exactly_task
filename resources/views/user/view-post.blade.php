<x-BaseComponent tailwindcss="true" title="{{ $post->title }}" remixicon="true" slick="true">
    <main class="w-full bg-gray-200 pt-25 pb-10">
        <section class="max-w-7xl mx-auto bg-white shadow-sm rounded mt-5 p-8">
            <div class="flex justify-end items-center gap-2">
                @can('update', $post)
                <a href="" class="bg-blue-700 text-white px-3 py-1 rounded"><i class="ri-file-edit-line me-1"></i>Edit</a>
                @endcan

                @can('delete', $post)
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-700 text-white px-3 py-1 rounded"><i class="ri-delete-bin-5-line me-1"></i>Delete</button>
                </form>
                @endcan
            </div>
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-80 rounded shadow mb-3">
            <h2 class="font-semibold text-black text-2xl">{{ $post->title }}</h2>
            <div class="flex flex-row items-center gap-2 mb-3.5 mt-1">
                <i class="ri-user-3-line"></i> {{ $post->user->fname . ' ' . $post->user->lname }}
                <span>|</span>
                <i class="ri-calendar-check-line"></i> {{ $post->created_at }}
                <span>|</span>
                <i class="ri-message-2-line me-1"></i>Comments: {{ $post->comments->count() }}
                <span>|</span>
                <span class="bg-gray-100 border border-gray-300 px-2 rounded">{{ $post->category }}</span>
            </div>
            <p class="text-base text-gray-800">{!! $post->content !!}</p>
        </section>
        <section class="max-w-7xl mx-auto bg-white shadow-sm rounded mt-5 p-8">
            @forelse ($post->comments as $comment)
            <div class="border-b border-gray-200 pb-3 mb-3">
                <div class="flex items-center justify-between text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <i class="ri-user-3-line"></i>
                        <span>{{ $comment->user->fname ?? 'Anonymous' }} {{ $comment->user->lname ?? '' }}</span>
                        <span>|</span>
                        <i class="ri-calendar-check-line"></i>
                        <span>{{ $comment->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        @can('update', $comment)
                        <a href="" class="bg-blue-700 text-white px-3 py-1 rounded"><i class="ri-file-edit-line me-1"></i>Edit</a>
                        @endcan
                        @can('delete', $comment)
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-700 text-white px-3 py-1 rounded"><i class="ri-delete-bin-5-line me-1"></i>Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
                <p class="mt-2 text-gray-800">{{ $comment->comment_body }}</p>
            </div>
            @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
            @endforelse
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
        @auth
        <section class="max-w-7xl mx-auto bg-white shadow-sm rounded mt-3 p-8">
            <form action="{{ route('home.comment', $post->id) }}" method="post">
                @csrf
                <textarea name="comment" id="comment" value="{{ old('comment') }}" placeholder="Comment here..." class="w-full border border-gray-400 outline-none rounded p-2 h-24 mb-2"></textarea>
                <button type="submit" class="bg-blue-700 px-5 py-1.5 rounded text-white cursor-pointer">Save</button>
            </form>
        </section>
        @endauth
    </main>
</x-BaseComponent>
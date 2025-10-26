<x-BaseComponent tailwindcss="true" title="Home" remixicon="true" slick="true">
    {{--main landing secton--}}
    <main class="flex justify-center items-center h-screen pt-24 bg-gray-100">
        <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">
            <div class="main-view-content md:col-span-2">
                @forelse($Posts as $post)
                <div class="relative rounded overflow-hidden shadow-lg">
                    <div class="w-full shadow-lg">
                        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-125 object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-6 flex flex-col justify-end">
                        <p class="text-sm tracking-widest text-gray-300 mb-2 capitalize">{{ $post->category }}</p>
                        <h2 class="text-3xl font-bold text-white mb-3">{{ $post->title }}</h2>
                        <div class="flex items-center text-gray-300 text-sm space-x-4 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="ri-user-3-line"></i>
                                {{ $post->user->fname . ' ' . $post->user->lname }}
                            </span>
                            <span>{{ $post->created_at }}</span>
                            <span>No Comments</span>
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed">{{ $post->content }}</p>
                    </div>
                </div>
                @empty
                <div class="relative rounded overflow-hidden shadow-lg">
                    <div class="w-full shadow-lg">
                        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8" alt="Blog Image" class="w-full h-125 object-cover">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent p-6 flex flex-col justify-end">
                        <p class="text-sm uppercase tracking-widest text-gray-300 mb-2">Software</p>
                        <h2 class="text-3xl font-bold text-white mb-3">Running macOS and Windows 10 on the Same Computer</h2>
                        <div class="flex items-center text-gray-300 text-sm space-x-4 mb-3">
                            <span class="flex items-center gap-1">
                                <i class="ri-user-3-line"></i>
                                akbarh
                            </span>
                            <span>July 7, 2021</span>
                            <span>No Comments</span>
                        </div>
                        <p class="text-gray-300 text-sm leading-relaxed">Cursus iaculis etiam in in nullam donec sem sed consequat scelerisque nibh amet, massa egestas risus, gravida vel amet, imperdiet ...</p>
                    </div>
                </div>
                @endforelse
            </div>
            <div class="space-y-6 bg-white p-5 rounded shadow-lg">
                <img src="{{ $singlePost->image }}" alt="Apple Store" class="w-full h-40 object-cover rounded-lg">
                @forelse($secondaryPost as $post)
                <div class="space-y-1.5">
                    <p class="text-xs uppercase text-blue-500 font-semibold tracking-widest">{{ $post->category }}</p>
                    <h3 class="text-gray-800 font-semibold">{{ Str::limit(strip_tags($post->title), 50, '...') }}</h3>
                </div>
                @empty
                <div class="space-y-2">
                    <p class="text-xs uppercase text-blue-500 font-semibold tracking-widest">Null</p>
                    <h3 class="text-gray-800 font-semibold leading-snug">No post available!</h3>
                </div>
                @endforelse
            </div>
        </div>
    </main>
    {{--main landing secton--}}

    {{---blog cards section--}}
    <section class="px-6 py-10 pb-5 bg-gray-100">
        <div class="max-w-7xl mx-auto md:col-span-4 grid md:grid-cols-4 gap-8">
            <div class="md:col-span-3">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Editor’s Pick</h2>
                    <a href="#" class="text-sm text-blue-500 hover:text-blue-700 flex items-center gap-1">
                        View All <i class="ri-arrow-right-long-line"></i>
                    </a>
                </div>

                <div class="editors-pick-showcase">
                    @forelse($Posts as $post)
                    <div class="px-4">
                        <div class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition h-64">
                            <div class="relative">
                                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-44 object-cover">
                                <span class="absolute top-2 left-2 bg-gray-800 text-white text-xs px-2 py-1 rounded">EDITORS PICK</span>
                            </div>
                            <div class="p-4">
                                <h3 class="text-gray-800 font-semibold text-sm leading-snug">
                                    {{ Str::limit(strip_tags($post->content), 50, '...') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="px-4">
                        <div class="bg-white rounded overflow-hidden shadow-sm hover:shadow-md transition h-64">
                            <div class="relative">
                                <img src="data:image/png;base64,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" alt="Netflix" class="w-full h-44 object-cover">
                                <span class="absolute top-2 left-2 bg-gray-800 text-white text-xs px-2 py-1 rounded">EDITORS PICK</span>
                            </div>
                            <div class="p-4">
                                <h3 class="text-gray-800 font-semibold text-sm leading-snug">
                                    Why Netflix shares are down 10%
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="bg-white border border-gray-200 p-6 rounded shadow-sm h-77 flex flex-col justify-center items-center">
                <div class="flex items-center mb-4">
                    <div class="bg-teal-500 text-white rounded-md p-1.5 mr-3">
                        <i class="ri-mail-unread-line mx-1 text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Subscribe to Our Newsletter</h3>
                </div>

                <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                    gravida aliquet vulputate faucibus tristique odio.
                </p>

                <form class="space-y-3">
                    <input type="email" placeholder="Email address" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-teal-400">
                    <button type="submit" class="w-full bg-teal-500 hover:bg-teal-600 text-white text-sm font-medium py-2 rounded-md">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>
    {{---blog cards section--}}

    {{--tech reviews section--}}
    <section class="py-5 bg-gray-100">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">Tech Reviews</h2>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    @forelse($techPosts as $post)
                    <article class="flex flex-col md:flex-row gap-4 border-b border-gray-200 pb-4">
                        <img
                            src="{{ $post->image }}"
                            alt="{{ $post->title }}"
                            class="w-full md:w-48 h-32 object-cover rounded shdow-sm" />
                        <div>
                            <span class="text-sm text-blue-600 font-medium uppercase">{{ $post->category }}</span>
                            <h3 class="text-lg font-semibold text-gray-900 mt-1">
                                {{ $post->title }}
                            </h3>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ Str::limit(strip_tags($post->content), 180, '...') }}
                            </p>
                            <div class="flex items-center text-xs text-gray-500 mt-2 space-x-2">
                                <span class="flex items-center gap-1"><i class="ri-user-3-line"></i> {{ $post->user->fname }}</span>
                                <span>•</span>
                                <span>{{ $post->created_at }}</span>
                            </div>
                        </div>
                    </article>
                    @empty
                    <article class="flex flex-col md:flex-row gap-4 border-b border-gray-200 pb-4">
                        <img
                            src="data:image/jpeg;base64,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"
                            alt="Dell XPS 13"
                            class="w-full md:w-48 h-32 object-cover rounded shadow-sm" />
                        <div>
                            <span class="text-sm text-blue-600 font-medium uppercase">Gadget</span>
                            <h3 class="text-lg font-semibold text-gray-900 mt-1">
                                Dell XPS 13 2021: The Best Windows Laptop Now with OLED
                            </h3>
                            <p class="text-sm text-gray-600 mt-2">
                                Cursus iaculis etiam in nullam donec sem sed consequat scelerisque nibh amet...
                            </p>
                            <div class="flex items-center text-xs text-gray-500 mt-2 space-x-2">
                                <span class="flex items-center gap-1"><i class="ri-user-3-line"></i> akruthi</span>
                                <span>•</span>
                                <span>July 7, 2021</span>
                            </div>
                        </div>
                    </article>
                    @endforelse
                </div>
                <aside class="space-y-8">
                    <div class="bg-[url('{{ $secondaryTechPost->image }}')] rounded p-4 flex flex-col items-center text-center bg-no-repeat bg-cover bg-center h-115 flex flex-col items-center text-center justify-center">
                        <h4 class="text-2xl font-semibold text-white">{{ $secondaryTechPost->title }}</h4>
                        <p class="text-base text-white mt-2">
                            {{ Str::limit(strip_tags($secondaryTechPost->content), 70, '...') }}
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    {{--tech reviews section--}}

    {{---subscription section--}}
    <section class="bg-gray-100 py-12 pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-extrabold text-gray-900">Stay Updated with new updates and </h2>
            <p class="mt-3 text-lg text-gray-600">
                Subscribe to our newsletter to get the latest reviews and updates directly in your inbox.
            </p>
            <form class="mt-8 flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <input
                    type="email"
                    placeholder="Enter your email"
                    class="w-92 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button
                    type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Subscribe
                </button>
            </form>
        </div>

    </section>
    {{---subscription section--}}
</x-BaseComponent>
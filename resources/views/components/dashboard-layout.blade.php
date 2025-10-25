@props(['title' => '', 'tailwindcss' => '', 'remixicon' => ''])
<x-AuthLayout title="{{ $title }}" tailwindcss="{{ $tailwindcss }}" remixicon="{{ $remixicon }}">
    <main class="w-full flex flex-col md:flex-row h-screen">
        <x-AdminSidebar />
        <main class="w-5/6 px-3 pt-18 relative">
            <nav role="navigation" class="bg-gray-200 absolute top-0 left-0 w-full flex flex-row justify-end py-3 pe-8 gap-3">
                <input type="text" placeholder="Search..." class="outline-none border-gray-400 border rounded px-3 py-1">
                <button class="bg-gray-700 px-3 py-1.5 rounded text-white cursor-pointer">Search</button>
            </nav>
            {{ $slot }}
        </main>
    </main>
</x-AuthLayout>
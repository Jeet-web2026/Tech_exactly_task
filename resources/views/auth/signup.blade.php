<x-AuthLayout tailwindcss="true" title="Signup" remixicon="true">
    <main class="h-screen w-full bg-gray-100">
        <div class="container mx-auto h-full flex justify-center flex-col items-center gap-8 relative">
            <a href="{{ url('/') }}" wire:navigate class="absolute top-8 left-0 px-4 py-2 bg-blue-900 rounded shadow text-white"><i class="ri-arrow-left-long-line text-white me-1"></i>Back</a>
            <form>
                @csrf
                <div class="shadow p-8 bg-white rounded border border-gray-200">
                    <h2 class="uppercase text-2xl bg-gray-500 text-white py-3 font-semibold text-center mb-8 border rounded">Signup</h2>
                    <div class="flex justify-center items-center gap-2 mb-5">
                        <a href="" class="text-red-800 font-medium text-2xl flex items-center gap-2 border border-gray-300 px-2 rounded-full">
                            <i class="ri-google-line"></i><span class="text-sm text-black font-medium">Signup with Google</span>
                        </a>
                        <a href="" class="text-blue-500 font-medium text-2xl flex items-center gap-2 border border-gray-300 px-2 rounded-full">
                            <i class="ri-facebook-circle-line"></i><span class="text-sm text-black font-medium">Signup with Facebook</span>
                        </a>
                    </div>
                    <div class="flex flex-row items-center gap-3 mb-3">
                        <div class="flex flex-col">
                            <p class="text-lg text-black font-medium">First name</p>
                            <input type="text" class="border py-1.5 rounded border-gray-400 outline-none px-2" name="firstname" value="{{ old('firstname') }}">
                            @error('firstname')
                            <span class="text-red-800 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <p class="text-lg text-black font-medium">Last name</p>
                            <input type="text" class="border py-1.5 rounded border-gray-400 outline-none px-2" name="lastname" value="{{ old('lastname') }}">
                            @error('lastname')
                            <span class="text-red-800 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="text-lg text-black font-medium">Email Id</p>
                        <input type="email" class="border py-1.5 rounded border-gray-400 outline-none px-2 w-full" name="email" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-red-800 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <p class="text-lg text-black font-medium">Password</p>
                        <input type="password" class="border py-1.5 rounded border-gray-400 outline-none px-2 w-full" name="password" value="{{ old('password') }}">
                        @error('password')
                        <span class="text-red-800 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="w-full py-2.5 text-lg bg-blue-800 cursor-pointer text-white rounded flex flex-row justify-center items-center gap-2">
                        Submit
                    </button>
                    <p class="text-center mt-3">Already have an account? <a href="{{ route('signin') }}" wire:navigate class="text-blue-700">Signin here</a></p>
                </div>
            </form>
        </div>
    </main>
</x-AuthLayout>
<x-DashboardLayout title="User edit" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="relative overflow-x-auto">
            <h2 class="ps-3 bg-black text-white py-2 text-2xl font-semibold">User Edit</h2>
            <form action="{{ route('admin.users-save', $userDetail->id) }}" method="post">
                @csrf
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                First name
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                                <input type="text" value="{{ $userDetail->fname }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none" name="fname">
                                @error('fname')
                                <span class="text-red-700 text-sm">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                Last name
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                                <input type="text" value="{{ $userDetail->lname }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none" name="lname">
                                @error('lname')
                                <span class="text-red-700 text-sm">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                Email id
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                                <input type="text" value="{{ $userDetail->email }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none" name="email">
                                @error('email')
                                <span class="text-red-700 text-sm">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                Status
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                                <select name="status" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                                    <option value="active" @if($userDetail->status == 'active') selected @endif>Active</option>
                                    <option value="banned" @if($userDetail->status == 'banned') selected @endif>Banned</option>
                                </select>
                                @error('status')
                                <span class="text-red-700 text-sm">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                Permissions
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200 flex flex-row gap-6">
                                <div class="flex flex-row items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="post" class="h-4 outline-none" id="can-post" @if(isset($userDetail->permissions['post']) && $userDetail->permissions['post'] == 1) checked @endif>
                                    <label>Can post</label>
                                </div>
                                <div class="flex flex-row items-center gap-2">
                                    <input type="checkbox" name="permissions[]" value="comment" class="h-4 outline-none" id="can-comment" @if(isset($userDetail->permissions['comment']) && $userDetail->permissions['comment'] == 1) checked @endif>
                                    <label>Can comment</label>
                                </div>
                                @error('permissions')
                                <span class="text-red-700 text-sm">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                            <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                                <a href="{{ route('admin.users') }}" class="bg-gray-500 px-8 py-2.5 rounded text-white cursor-pointer">Back</a>
                                <button type="submit" class="bg-blue-700 px-8 py-2 rounded text-white cursor-pointer">Save</button>
                            </td>
                            <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200 flex flex-row gap-6"></td>
                        </tr>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</x-DashboardLayout>
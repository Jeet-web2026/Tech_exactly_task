<x-DashboardLayout title="User edit" tailwindcss="true" remixicon="true">
    <div class="grid grid-cols-1 gap-2">
        <div class="relative overflow-x-auto">
            <h2 class="ps-3 bg-black text-white py-2 text-2xl font-semibold">User Edit</h2>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <tbody>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            First name
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <input type="text" value="{{ $userDetail->fname }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            Last name
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <input type="text" value="{{ $userDetail->lname }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            Email id
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <input type="text" value="{{ $userDetail->email }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            Date of creation
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <input type="text" value="{{ $userDetail->created_at }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            Status
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <select name="" id="" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                                <option value="active" {{ $userDetail->status ?  }}>Active</option>
                                <option value="banned">Banned</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="bg-white dark:bg-gray-100 border-b border-gray-200 text-base">
                        <td class="px-6 py-3 font-medium w-1/4 text-gray-900 whitespace-nowrap text-black border-r border-gray-200">
                            Permissions
                        </td>
                        <td class="px-6 py-3 w-3/4 text-black border-r border-gray-200">
                            <input type="text" value="{{ $userDetail->created_at }}" class="w-full border border-gray-300 rounded px-3 py-2 outline-none">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-DashboardLayout>
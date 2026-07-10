<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-700">Accounts Saved</h2>
                        <p class="text-2xl font-bold text-green-600">{{ $totalAccounts }}</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-700">Search Site</h2>
                        <form action="{{ route('dashboard') }}" method="get" >
                            @csrf
                            <input name="search" type="text" class="text-2xl font-bold text-yellow-600">
                            <button type="submit" class="px-6 py-2 min-w-[120px] text-center text-violet-600 border border-violet-600 rounded hover:bg-violet-600 hover:text-white active:bg-indigo-500 focus:outline-none focus:ring">search</button>
                        </form>
                    </div>
                </div>
                <div class="grid grid-cols-1 mt-10">
                    <h1 class="mb-3">Add Account</h1>
                    <form method="POST" class="loading-form" action="{{ route('dashboard.add') }}">
                        @csrf
                        <div class="flex flex-row gap-20">
                            <input
                                id="siteName"
                                name="siteName"
                                type="text"
                                class="text-sm leading-none font-medium border border-gray-300 dark:border-gray-600 rounded-md px-5 py-5 focus:outline-none focus:border-blue-500 dark:focus:border-white dark:bg-gray-800 dark:text-white"
                                placeholder="Site Name"
                                minlength="5"
                                maxlength="100"
                                autocomplete="off"
                                required
                            >
                            <input
                                id="email"
                                name="savedEmail"
                                type="text"
                                class="text-sm leading-none font-medium border border-gray-300 dark:border-gray-600 rounded-md px-5 py-5 focus:outline-none focus:border-blue-500 dark:focus:border-white dark:bg-gray-800 dark:text-white"
                                placeholder="Email/Phone#"
                                minlength="5"
                                maxlength="100"
                                autocomplete="off"
                                required
                            >
                            <input
                                id="password"
                                name="savedPassword"
                                type="password"
                                class="text-sm leading-none font-medium border border-gray-300 dark:border-gray-600 rounded-md px-5 py-5 focus:outline-none focus:border-blue-500 dark:focus:border-white dark:bg-gray-800 dark:text-white"
                                placeholder="Password"
                                minlength="8"
                                maxlength="100"
                                autocomplete="off"
                                required
                            >
                            <button
                                type="submit" class=" loading-btn px-8 py-4 min-w-[120px] text-center text-violet-600 border border-violet-600 rounded hover:bg-violet-600 hover:text-white active:bg-indigo-500 focus:outline-none focus:ring">
                                <svg
                                    class="spinner hidden animate-spin h-5 w-5 mr-5"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24">
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4">
                                    </circle>

                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4A10 10 0 002 12h2z">
                                    </path>
                                </svg>
                                <span class="btn-text">
                                    Save
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
                <table class="w-full border-collapse border border-blue-500 max-w-xl mt-16 mx-auto">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="py-2 px-4 text-left">Site Name</th>
                            <th class="py-2 px-4 text-left">Email/Phone#</th>
                            <th class="py-2 px-4 text-left">Password</th>
                            <th class="py-2 px-4 text-left"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $acc)
                            <tr class="bg-white border-b border-blue-500">
                                <td class="py-2 px-4">{{ $acc['siteName'] }}</td>
                                <td class="py-2 px-4">{{ $acc['email'] }}</td>
                                <td class="py-2 px-4">{{ $acc['password'] }}</td>
                                <td class="py-2 px-4">
                                    <button command="show-modal" commandfor="dialog-{{ $acc['id'] }}">Update</button>
                                        <el-dialog>
                                            <dialog id="dialog-{{ $acc['id'] }}" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                                <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                                <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                                <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                    <div class="sm:flex sm:items-start">
                                                        <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                                                            <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        </div>
                                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Update account</h3>
                                                    <form action="{{ route('dashboard.update') }}" method="POST" class="loading-form">
                                                        @csrf
                                                        <div class="mt-2 flex flex-col">
                                                            <input type="text" class="text-md text-black-500 mb-3" placeholder="siteName" name="siteName" value="{{ $acc['siteName'] }}">
                                                            <input type="text" minlength="5" maxlength="100" class="text-md  text-black-500 mb-3" placeholder="Email/Phone#" name="email" value="{{ $acc['email'] }}">
                                                            <input type="text" minlength="8" maxlength="100" class="text-md text-black-500 mb-3" placeholder="Password" name="password" value="{{ $acc['password'] }}">
                                                            <input type="hidden" class="text-md text-black-500 mb-3" placeholder="id" name="save_id" value="{{ $acc['id'] }}">
                                                        </div>

                                                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                            <button type="submit" command="close" class="loading-btn inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                <svg
                                                                    class="spinner hidden animate-spin h-5 w-5 mr-5"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <circle
                                                                        class="opacity-25"
                                                                        cx="12"
                                                                        cy="12"
                                                                        r="10"
                                                                        stroke="currentColor"
                                                                        stroke-width="4">
                                                                    </circle>

                                                                    <path
                                                                        class="opacity-75"
                                                                        fill="currentColor"
                                                                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4A10 10 0 002 12h2z">
                                                                    </path>
                                                                </svg>
                                                                <span class="btn-text">
                                                                    Update
                                                                </span>
                                                            </button>
                                                            <button type="button" command="close" commandfor="dialog-{{ $acc['id'] }}" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                                        </div>
                                                    </form>
                                                                                                            </div>
                                                        </div>
                                                        </div>


                                                </el-dialog-panel>
                                                </div>
                                            </dialog>
                                        </el-dialog>

                                    {{--  --}}
                                    <button command="show-modal" commandfor="dialog-{{ $acc['id'] }}-delete">Delete</button>
                                    <el-dialog>
                                        <dialog id="dialog-{{ $acc['id'] }}-delete" aria-labelledby="dialog-title" class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                                            <el-dialog-backdrop class="fixed inset-0 bg-gray-500/75 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                                            <div tabindex="0" class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                                            <el-dialog-panel class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-lg data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex size-12 shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:size-10">
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 text-red-600">
                                                        <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 id="dialog-title" class="text-base font-semibold text-gray-900">Delete account</h3>
                                                    <div class="mt-2">
                                                        <p class="text-sm text-gray-500">Are you sure you want to Delete your account?</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                    <form action="{{ route('dashboard.delete') }}" method="post" class="loading-form">
                                                        @csrf
                                                        <input type="hidden" name="delete" value="{{ $acc['id'] }}" name="deleteAccount">
                                                         <button type="submit" command="close" class="loading-btn inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">
                                                                <svg
                                                                    class="spinner hidden animate-spin h-5 w-5 mr-5"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <circle
                                                                        class="opacity-25"
                                                                        cx="12"
                                                                        cy="12"
                                                                        r="10"
                                                                        stroke="currentColor"
                                                                        stroke-width="4">
                                                                    </circle>

                                                                    <path
                                                                        class="opacity-75"
                                                                        fill="currentColor"
                                                                        d="M4 12a8 8 0 018-8v4l3-3-3-3v4A10 10 0 002 12h2z">
                                                                    </path>
                                                                </svg>
                                                                <span class="btn-text">
                                                                    Delete
                                                                </span>
                                                            </button>
                                                    </form>
                                                        <button type="button" command="close" commandfor="dialog-{{ $acc['id'] }}-delete" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-xs inset-ring inset-ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                                                </div>
                                            </el-dialog-panel>
                                            </div>
                                        </dialog>
                                    </el-dialog>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.loading-form').forEach(form => {
            form.addEventListener('submit', function () {
                const button = this.querySelector('.loading-btn');
                const spinner = button.querySelector('.spinner');
                const text = button.querySelector('.btn-text');

                spinner.classList.remove('hidden');
                text.textContent = 'Processing';
                button.disabled = true;
                });
            });
        });
    </script>
</x-app-layout>

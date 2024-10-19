<x-guest-layout>

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-16 lg:py-24 pt-20 sm:pt-24 lg:pt-32">
            <div class="max-w-screen-sm mx-auto text-center">
                <h1 class="mb-4 text-3xl font-extrabold tracking-tight sm:text-4xl text-blue-700 dark:text-blue-500">
                    404 Not Found
                </h1>
                <p class="mb-8 font-medium text-gray-500 sm:text-2xl dark:text-gray-400">
                    Whoops! That page doesn’t exist.
                </p>

                <form action="#" method="post" class="max-w-md mx-auto">
                    <div class="items-center mb-3 space-y-4 sm:flex sm:space-y-0">
                        <div class="relative w-full mr-3">
                            <label for="member_email"
                                class="hidden mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Email
                                address</label>
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input
                                class="block w-full p-3 pl-10 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="e.g. Flowbite, components" type="email" id="member_email" required="">
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full px-5 py-3 text-sm font-medium text-center text-white rounded-lg cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="grid max-w-5xl gap-6 mx-auto mt-8 lg:mt-12 sm:grid-cols-2 lg:gap-10 lg:grid-cols-4">
                <a href="{{ app_url() }}"
                    class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:hover:bg-gray-700 hover:shadow-lg">
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 rounded-lg bg-blue-100 dark:bg-blue-900 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 lg:w-6 lg:h-6" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold tracking-tight text-gray-500 dark:text-gray-400">Homepage</h3>
                </a>

                <a href="{{ app_url('vehicles') }}"
                    class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:hover:bg-gray-700 hover:shadow-lg">
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-teal-100 rounded-lg dark:bg-teal-900 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-teal-600 lg:w-6 lg:h-6 dark:text-teal-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold tracking-tight text-gray-500 dark:text-gray-400">Vehicles</h3>
                </a>

                <a href="{{ app_url('help') }}"
                    class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:hover:bg-gray-700 hover:shadow-lg">
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-purple-100 rounded-lg dark:bg-purple-900 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 lg:w-6 lg:h-6" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold tracking-tight text-gray-500 dark:text-gray-400">Help Center</h3>
                </a>

                <a href="{{ app_url('blog') }}"
                    class="p-6 text-center bg-white rounded-lg shadow-md dark:bg-gray-800 dark:hover:bg-gray-700 hover:shadow-lg">
                    <div
                        class="flex items-center justify-center w-10 h-10 mx-auto mb-4 bg-green-100 rounded-lg dark:bg-green-900 lg:h-12 lg:w-12">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 lg:w-6 lg:h-6" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold tracking-tight text-gray-500 dark:text-gray-400">Blog</h3>
                </a>
            </div>
        </div>
    </section>

</x-guest-layout>

<x-guest-layout>
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 md:text-4xl lg:mb-8 dark:text-white">How
                can we help you?</h2>
            <label for="search-faq" class="block mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your
                Email</label>
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="search-faq"
                    class="block p-4 pl-12 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Type keywords to find answers">
            </div>
        </div>
        <div class="grid gap-8 my-8 xl:gap-16 sm:grid-cols-2 md:grid-cols-3">
            <div class="p-4 rounded-lg border border-gray-200 shadow lg:p-8 dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-extrabold dark:text-white">Billing & Plans</h3>
                <ul role="list" class="mb-4 space-y-3 text-blue-600 dark:text-blue-500">
                    <li>
                        <a href="#" class="hover:underline">{{app_name()}} plans & prices</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Switch plans and add-ons</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">I can't log in to {{app_name()}}</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">The Disney Bundle</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Student Discount on {{app_name()}}</a>
                    </li>
                </ul>
            </div>
            <div class="p-4 rounded-lg border border-gray-200 shadow lg:p-8 dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-extrabold dark:text-white">Using {{app_name()}}</h3>
                <ul role="list" class="mb-4 space-y-3 text-blue-600 dark:text-blue-500">
                    <li>
                        <a href="#" class="hover:underline">Parental Controls</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Devices to watch {{app_name()}}</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Home location for Live TV</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Live TV Guide</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Fix buffering issues</a>
                    </li>
                </ul>
            </div>
            <div class="p-4 rounded-lg border border-gray-200 shadow lg:p-8 dark:border-gray-700 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-extrabold dark:text-white">What’s on {{app_name()}}</h3>
                <ul role="list" class="mb-4 space-y-3 text-blue-600 dark:text-blue-500">
                    <li>
                        <a href="#" class="hover:underline">NEW this month!</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Sports Add-on for Live TV</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Watch live sports</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">FX shows & movies</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Super Bowl 2022</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="justify-between items-center mb-8 sm:mb-24 sm:flex">
            <div class="mb-4 sm:mb-0">
                <h3 class="mb-2 text-2xl font-extrabold text-gray-900 dark:text-white">Not what you were looking for?
                </h3>
                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Browse through all of our Help Center
                    articles</p>
            </div>
            <a href="#"
                class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                Get started
            </a>
        </div>
        <div class="grid gap-16 lg:grid-cols-3">
            <div class="hidden lg:block">
                <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Points of contact</h3>
                <h4 class="mb-1 font-medium text-gray-900 dark:text-white">NG. {{app_name()}}</h4>
                <address class="text-sm font-normal text-gray-500 non-italic">
                    11350 McCormick Rd, EP III, Suite 200,
                    <br>Hunt Valley, MD 21031
                </address>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">Information & Sales</h4>
                <p class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"><a
                        href="mailto:sales@<?php app_url() ?>">sales@<?php app_url() ?></a></p>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">Support</h4>
                <p class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"><a
                        href="support@<?php app_url() ?>">support@<?php app_url() ?></a></p>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">Verification of Employment</h4>
                <p class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500"><a
                        href="hr@<?php app_url() ?>">hr@<?php app_url() ?></a></p>
                <h3 class="mt-5 mb-4 text-lg font-semibold text-gray-900 dark:text-white">Our offices around the world
                </h3>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">Canada</h4>
                <address class="text-sm font-normal text-gray-500 non-italic">
                    5333 Avenue Casgrain #1201,
                    <br>Montréal, QC H2T 1X3
                </address>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">Germany</h4>
                <address class="text-sm font-normal text-gray-500 non-italic">
                    Neue Schönhauser Str. 3-5,
                    <br>10178 Berlin
                </address>
                <h4 class="mt-4 mb-1 font-medium text-gray-900 dark:text-white">France</h4>
                <address class="text-sm font-normal text-gray-500 non-italic">
                    266 Place Ernest Granier,
                    <br>34000 Montpellier
                </address>
            </div>
            <div class="col-span-2">
                <h2
                    class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 lg:mb-8 md:text-4xl dark:text-white">
                    Still need help?</h2>
                <form action="#" class="space-y-8">
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email address
                            <span class="text-xs text-gray-500">(So we can reply to you)</span></label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="name@<?php app_url() ?>" required>
                    </div>
                    <div>
                        <label for="topic"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Topic</label>
                        <select id="topic"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select a topic</option>
                            <option value="US">Switch plans and add-ons</option>
                            <option value="CA">Billing & Invoice</option>
                            <option value="FR">I can't log in to {{app_name()}}</option>
                            <option value="DE">Parental controls</option>
                        </select>
                    </div>
                    <div>
                        <label for="subject"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                        <input type="text" id="subject"
                            class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="Let us know how we can help you" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your
                            message</label>
                        <textarea id="message" rows="6"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Leave a comment..."></textarea>
                        <div class="flex mt-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 mt-0.5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ml-2 text-sm font-light text-gray-500 dark:text-gray-400">By submitting this
                                form, you confirm that you have read and agree to our <a
                                    class="font-normal text-gray-900 underline hover:no-underline dark:text-white"
                                    href="{{ route('terms.show') }}">Terms of Service</a> and <a
                                    class="font-normal text-gray-900 underline hover:no-underline dark:text-white"
                                    href="{{ route('privacy.show') }}">Privacy Statement</a>.</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 sm:w-fit hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send
                        message</button>
                </form>
            </div>
        </div>
    </div>
    </x-layouts-guest>

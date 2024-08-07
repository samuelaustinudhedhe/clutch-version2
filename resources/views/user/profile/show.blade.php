{{-- Container --}}
<div class="">
    {{-- Top Section --}}
    <div
        class="rounded-xl bg-white dark:bg-gray-800 text-center text-gray-600 dark:text-gray-300 shadow-lg overflow-hidden sm:p-8 p-4 mt-10 sm:m-4 ">
        <h1 class="lg:text-2xl text-xl mb-2 text-gray-900 dark:text-white">Personal info</h1>
        <p class="mb-6 lg:text-base text-sm">Info about you and your preferences across Clutch services</p>

        <figure>
            <svg class="rounded-xl" preserveAspectRatio="none" width="100%" height="161" viewBox="0 0 1113 161"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" width="1112" height="161" fill="#E0F7FA"></rect>
                <rect x="1" width="1112" height="348" fill="#B2EBF2"></rect>
                <path d="M512.694 359.31C547.444 172.086 469.835 34.2204 426.688 -11.3096H1144.27V359.31H512.694Z"
                    fill="#4DD0E1"></path>
                <path
                    d="M818.885 185.745C703.515 143.985 709.036 24.7949 726.218 -29.5801H1118.31V331.905C1024.49 260.565 963.098 237.945 818.885 185.745Z"
                    fill="#00BCD4"></path>
            </svg>
        </figure>

        <div class="flex justify-center -mt-16">
            {{ getUserPP(true, 'rounded-full border-4 border-white h-20 w-20 object-cover') }}
        </div>

        <div class="text-center mt-2 mb-4">
            <h2 class="lg:text-xl text-lg font-semibold">{{ getUserMeta('name') }}</h2>
            <p class="text-gray-600 lg:text-base text-sm">{{ getUserMeta('email') }}</p>
        </div>
    </div>

    {{-- Basic info --}}
    <div
        class="rounded-xl bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 overflow-hidden dark:border-gray-600 pt-4 sm:pt-6 pb-2 sm:pl-8 pl-4 sm:mx-4 my-8 ">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 sm:pr-8 pr-4">Basic info</h3>
        <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 sm:pr-8 pr-4">
            Some info may be visible to other people using our services.
            <a href="#" class="text-blue-500">Learn more</a>
        </p>

        {{-- main --}}
        <a href="{{ route('user.profile.picture') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Profile picture
                </div>
                <div class="w-full lg:w-3/5 text-sm">
                    {{ getUserPP() ? 'Change your profile picture' : 'Add a profile picture to personalize your account' }}
                </div>
            </div>
            {{ getUserPP(true, ' rounded-full border-4 border-white h-14 w-14 object-cover') }}
        </a>
        <a href="{{ route('user.profile.name') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Name</div>
                <div class="w-full lg:w-3/5">{{ getUserMeta('name') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="{{ route('user.profile.birthday') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Birthday</div>
                <div class="w-full lg:w-3/5">{{ getUserMeta('date_of_birth') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="#" wire:click="updateGender"
            class="flex items-center justify-between border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Gender</div>
                <div class="w-full lg:w-3/5">{{ getUserMeta('gender') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

    </div>

    {{-- Contact info --}}
    <div
        class="rounded-xl bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 overflow-hidden dark:border-gray-600 pt-4 sm:pt-6 pb-2 sm:pl-8 pl-4 sm:mx-4 my-8 ">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 sm:pr-8 pr-4">Contact info</h3>

        {{-- main --}}
        <a href="{{ route('user.profile.email') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Email</div>
                <div class="w-full lg:w-3/5">{{ getUserMeta('email') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="{{ route('user.profile.phone') }}"
            class="flex items-center justify-between border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Phone</div>
                <div class="w-full lg:w-3/5">{{ getUserPhone(format: true) }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

    </div>

    {{-- Addresses --}}
    <div
        class="rounded-xl bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 overflow-hidden dark:border-gray-600 pt-4 sm:pt-6 pb-2 sm:pl-8 pl-4 sm:mx-4 my-8 ">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 sm:pr-8 pr-4">Address</h3>
        <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 sm:pr-8 pr-4">
            Manage your addresses associated with your Account.
            <a href="#" class="text-blue-500">Learn more about addresses saved to your account</a>
        </p>

        {{-- add user addresses in db and update helper function  --}}
        <a href="{{ route('user.profile.address') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Work</div>
                <div class="w-full lg:w-3/5">{{ getUserAddress('home', 'street, city, state,') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="{{ route('user.profile.address') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Home</div>
                <div class="w-full lg:w-3/5">{{ getUserAddress('work', 'street, city, state,') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="{{ route('user.profile.address') }}"
            class="flex items-center justify-between border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Other</div>
                <div class="w-full lg:w-3/5">{{ getUserAddress('others', 'street, city, state,') }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

    </div>

    {{-- Password --}}
    <div
        class="rounded-xl bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-300 overflow-hidden dark:border-gray-600 pt-4 sm:pt-6 pb-2 sm:pl-8 pl-4 sm:mx-4 my-8 ">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 sm:pr-8 pr-4">Password & Authentication</h3>
        <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 sm:pr-8 pr-4">
            A secure password and 2AF helps to protect your Account.
        </p>

        {{-- check later for bugs on Authentication enable and disable --}}

        <a href="{{ route('user.profile.password') }}"
            class="flex items-center justify-between border-b border-inherit py-4 sm:pr-8 pr-4">
            <div class=" w-5/6 ">
                <div class="w-full font-semibold mb-1">••••••••</div>
                <div class="w-full text-sm">
                    {{ getUserMeta('last_password_change') ?? getUserMeta('created_at') }}
                </div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <a href="{{ route('user.profile.2af') }}"
            class="flex items-center justify-between border-inherit py-4 sm:pr-8 pr-4">
            <div class="lg:flex w-5/6 lg:w-2/3">
                <div class="w-full lg:w-2/5 text-xs font-medium text-gray-600 dark:text-gray-400">Authentication
                </div>
                <div class="w-full lg:w-3/5">
                    {{ getUserMeta('two_factor_confirmed_at') ? 'Enabled' : 'Disabled' }}</div>
            </div>

            <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

    </div>

</div>

{{-- Onboarding KYC --}}
<div>
    <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-800 leding-tight dark:text-white">
        Verify Your Identity
    </h1>
    <p class="font-light text-gray-600 dark:text-gray-300">
        Please upload your ID card and or International Passport,
        @if ($storeData['role'] === 'driver' || $user->role === 'driver')
            Driver's license,
        @endif
        and any Utility document that proves your address (not older than 2 months).
    </p>
    <x-div>

        <form class="max-w-lg mx-auto">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                file</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="user_avatar_help" id="user_avatar" type="file">
            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is useful
                to confirm your are logged into your account</div>
        </form>

    </x-div>
    @if ($storeData['role'] === 'driver' || $user->role === 'driver')
        <x-div>

            <form class="max-w-lg mx-auto">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is
                    useful
                    to confirm your are logged into your account</div>
            </form>

        </x-div>
        <x-div>

            <form class="max-w-lg mx-auto">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                    file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture is
                    useful
                    to confirm your are logged into your account</div>
            </form>

        </x-div>
    @endif


</div>

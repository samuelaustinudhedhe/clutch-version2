{{-- Onboarding Verification --}}
<div>

    <x-div>
        <p class="mb-2 text-lg font-extrabold tracking-tight text-gray-900 leding-tight dark:text-white">Verify your
            email
            address</p>
        <p class="text-sm font-light text-gray-500 dark:text-gray-400">We emailed you a verification link to <span
                class="font-medium text-gray-900 dark:text-white">{{ $user->email ?? 'your email' }}</span>.
            click on it to confirm your email address.</p>
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
            <p class="text-sm mt-2 dark:text-white">
                {{ __('Your email address is unverified.') }}

                <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        @endif
    </x-div>
    {{-- @if (!$user->phone->home->verified_at && $user->phone->home->country_code && $user->phone->home->number)
        <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 leding-tight dark:text-white">Verify
            your phone number</h1>
        <p class="font-light text-gray-500 dark:text-gray-400">We sent you a four-digit code to <span
                class="font-medium text-gray-900 dark:text-white">{{ $user->phone->home->country_code . $user->phone->home->number ?? 'your phone number' }}</span>.
            Enter the code below to confirm your phone number.</p>
        <form action="#">
            <div class="flex my-4 space-x-2 sm:space-x-4 md:my-6">
                <div>
                    <label for="code-1" class="sr-only">First code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-2')"
                        id="code-1"
                        class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-12 sm:h-12 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="code-2" class="sr-only">Second code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-3')"
                        id="code-2"
                        class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-12 sm:h-12 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="code-3" class="sr-only">Third code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-2', 'code-4')"
                        id="code-3"
                        class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-12 sm:h-12 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="code-4" class="sr-only">Fourth code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-3', 'code-4')"
                        id="code-4"
                        class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-12 sm:h-12 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
            </div>
            <p class="p-4 mb-4 text-sm text-gray-500 rounded-lg bg-gray-50 dark:text-gray-400 md:mb-6 dark:bg-gray-800">
                Make sure to keep this window open while you check your messages.</p>
        </form>
    @endif --}}

</div>

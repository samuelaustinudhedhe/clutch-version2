{{-- Onboarding Verification --}}
<div>
    <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 leding-tight dark:text-white">Verify your email
        address</h1>
    <p class="font-light text-gray-500 dark:text-gray-400">We emailed you a six-digit code to <span
            class="font-medium text-gray-900 dark:text-white">name@company.com</span>. Enter the code below to confirm
        your
        email address.</p>
    <form action="#">
        <div class="flex my-4 space-x-2 sm:space-x-4 md:my-6">
            <div>
                <label for="code-1" class="sr-only">First code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-2')" id="code-1"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="code-2" class="sr-only">Second code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-3')" id="code-2"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="code-3" class="sr-only">Third code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-2', 'code-4')" id="code-3"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="code-4" class="sr-only">Fourth code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-3', 'code-5')" id="code-4"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="code-5" class="sr-only">Fivth code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-4', 'code-6')" id="code-5"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
            <div>
                <label for="code-6" class="sr-only">Sixth code</label>
                <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-5', 'code-6')" id="code-6"
                    class="block w-12 h-12 py-3 text-2xl font-extrabold text-center text-gray-900 bg-white border border-gray-300 rounded-lg sm:py-4 sm:text-4xl sm:w-16 sm:h-16 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
            </div>
        </div>
        <p class="p-4 mb-4 text-sm text-gray-500 rounded-lg bg-gray-50 dark:text-gray-400 md:mb-6 dark:bg-gray-800">Make
            sure to keep this window open while check your inbox.</p>

    </form>
</div>

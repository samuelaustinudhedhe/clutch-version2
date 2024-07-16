<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-700 dark:bg-blue-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-700 uppercase tracking-widest hover:bg-blue-600 dark:hover:bg-white focus:bg-blue-600 dark:focus:bg-white active:bg-blue-900 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-700 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<div class="flex flex-col items-center justify-center p-8 text-center">
    <x-img src="/assets/images/banners/no-result.png" alt="No Results Found" class="w-full h-auto max-w-sm mx-auto md:max-w-md mb-6"/>
    
    <h2 class="text-2xl font-bold mb-2">No Results Found</h2>
    
    <p class="text-gray-600 dark:text-gray-300 mb-4">
        We couldn't find any vehicles matching your search criteria. 
        Try adjusting your filters or search terms.
    </p>
    
    <button onclick="window.location.href='{{ route('vehicles.index') }}'" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
        Reset Search
    </button>
</div>
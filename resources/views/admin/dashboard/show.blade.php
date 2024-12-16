{{-- Admin Dashboard --}}
<x-admin-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div class="mx-6">
        <x-chart.line :series="[
            ['name' => 'Sales', 'data' => [10, 41, 35, 51, 49, 62, 69, 91, 148]],
            ['name' => 'Revenue', 'data' => [23, 42, 35, 27, 43, 22, 17, 29, 45]],
        ]" :xaxis="['categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']]" :colors="['#FF5733', '#33FF57']" height="400" width="100%" />
        {{-- <x-chart.line :series="[
            ['name' => 'Sales', 'data' => [10, 41, 35, 51, 49, 62, 69, 91, 148]],
            ['name' => 'Revenue', 'data' => [23, 42, 35, 27, 43, 22, 17, 29, 45]],
        ]" :xaxis="['categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']]" :colors="['#FF5733', '#33FF57']" height="400" width="100%" />
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        
        <!-- Demo Line Chart -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <x-chart.pie :series="[22, 44, 30]" :colors="['#FF5733', '#33FF57', '#3357FF']" :labels="['Category A', 'Category B', 'Category C']" height="400" width="100%"
            legendPosition="right" />
                <x-chart.pie :series="[22, 44, 30]" :colors="['#FF5733', '#33FF57', '#3357FF']" :labels="['Category A', 'Category B', 'Category C']" height="400" width="100%"
            legendPosition="right" />

            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <x-chart.pie :series="[22, 44, 30]" :colors="['#FF5733', '#33FF57', '#3357FF']" :labels="['Category A', 'Category B', 'Category C']" height="400" width="100%" legendPosition="right" />
            </div>
            <div class="border-2 border-dashed border-gray-300 rounded-lg dark:border-gray-600 h-32 md:h-64">
                <x-chart.pie :series="[22, 44, 30]" :colors="['#FF5733', '#33FF57', '#3357FF']" :labels="['Category A', 'Category B', 'Category C']" height="400" width="100%" legendPosition="right" />
            </div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-32 md:h-64"></div>
        </div> --}}
        {{-- <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div>
        <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4"></div>
        <div class="grid grid-cols-2 gap-4">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-48 md:h-72"></div>
        </div> --}}
    </div>

</x-admin-layout>

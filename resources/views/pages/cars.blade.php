<x-guest-layout>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <!-- TOP BAR -->
          <div class="mb-4 divide-y divide-gray-200 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:divide-gray-700 dark:border-gray-700 dark:bg-gray-800 md:p-6">
            <div class="items-center justify-between pb-4 md:flex">
              <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white md:mb-0">Electronics - Top Products <span class="ms-2 text-lg font-medium text-gray-500 dark:text-gray-400">298 products</span></h2>
              <button id="infoButton" data-modal-target="infoModal" data-modal-toggle="infoModal" type="button" class="inline-flex items-center justify-center rounded-lg p-2 text-sm font-medium leading-none text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <span class="sr-only"> Info </span>
                <svg class="me-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                How the results are ordered
              </button>
              <!-- Info modal -->
              <div id="infoModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
                <div class="relative h-full w-full max-w-xl p-4 md:h-auto">
                  <!-- Modal content -->
                  <div class="relative rounded-lg bg-white p-4 shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="mb-4 flex items-center justify-between rounded-t border-b border-gray-200 pb-4 dark:border-gray-700 sm:mb-5 sm:pb-5">
                      <h3 class="font-semibold leading-none text-gray-900 dark:text-white">Sorting types in searches and listings</h3>
                      <div>
                        <button type="button" class="inline-flex rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="infoModal">
                          <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                          <span class="sr-only">Close modal</span>
                        </button>
                      </div>
                    </div>
                    <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">You can use these options to sort the results:</p>
                    <ul class="list-disc space-y-3 ps-8 text-sm text-gray-500 dark:text-gray-400">
                      <li><span class="font-medium text-gray-900 dark:text-white">Most Popular:</span> This is a prediction of how often each result will be purchased or viewed based on previous product interactions.</li>
                      <li><span class="font-medium text-gray-900 dark:text-white">Ascending Price:</span> Sort products by price. The item with the lowest price is at the top and the item with the lowest price is at the bottom.</li>
                      <li><span class="font-medium text-gray-900 dark:text-white">Descending Price:</span> Sort products by price. The item with the highest price is at the top and the item with the lowest price is at the bottom.</li>
                      <li><span class="font-medium text-gray-900 dark:text-white">No. Reviews:</span> This includes the total number of reviews for each result, the products with the highest number of reviews are displayed first.</li>
                      <li><span class="font-medium text-gray-900 dark:text-white">Discount%:</span> Sorts the list of products based on the discount percentage. The product with the highest percentage discount is at the top, and the product with the lowest percentage discount is at the bottom.</li>
                      <li><span class="font-medium text-gray-900 dark:text-white">Newest:</span> The newest products based on the day they were first available on Flowbite Shop.</li>
                    </ul>
                    <div class="mt-4 flex items-center gap-4 border-t border-gray-200 pt-4 dark:border-gray-700 sm:mt-5 sm:pt-5">
                      <button data-modal-toggle="infoModal" type="button" class="inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I understand</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="items-center justify-between space-y-4 py-4 lg:flex lg:space-y-0">
              <!--Dropdown Buttons -->
              <div class="grid grid-cols-2 items-center gap-4 md:flex ">
                <button id="brandsDropdownButton" data-dropdown-toggle="dropdownBrands" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Brands
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
                <!-- Dropdown -->
                <div id="dropdownBrands" class="z-50 hidden w-48 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700" data-popper-placement="bottom">
                  <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-1" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-1" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Apple <span class="ms-auto text-gray-500 dark:text-gray-400">1,276</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-2" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-2" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Microsoft <span class="ms-auto text-gray-500 dark:text-gray-400">2,522</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-3" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-3" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Samsung <span class="ms-auto text-gray-500 dark:text-gray-400">3,766</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-4" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="brand-checkbox-4" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Sony <span class="ms-auto text-gray-500 dark:text-gray-400">1,011</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-5" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-5" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Bosch <span class="ms-auto text-gray-500 dark:text-gray-400">967</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-6" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-6" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">ASUS <span class="ms-auto text-gray-500 dark:text-gray-400">1,022</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-7" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-7" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Dell <span class="ms-auto text-gray-500 dark:text-gray-400">467</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-8" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-8" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Huawei <span class="ms-auto text-gray-500 dark:text-gray-400">604</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-9" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-9" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Lenovo <span class="ms-auto text-gray-500 dark:text-gray-400">249</span></label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="brand-checkbox-10" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="brand-checkbox-10" class="inline-flex w-full items-center gap-2 text-gray-900 dark:text-gray-300">Philips <span class="ms-auto text-gray-500 dark:text-gray-400">969</span></label>
                    </li>
                  </ul>
                  <div class="p-2">
                    <button type="button" class="w-full rounded-md bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">See all 1,011 results</button>
                  </div>
                </div>
                <button id="priceDropdownButton" data-dropdown-toggle="dropdownPrice" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Price
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
                <!-- Dropdown -->
                <div id="dropdownPrice" class="z-50 hidden w-48 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700" data-popper-placement="bottom">
                  <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-1" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Under $10 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-2" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="price-range-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $10 to $20 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-3" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-3" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $20 to $30 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-4" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-4" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $30 to $40 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-5" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="price-range-5" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $40 to $50 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-6" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-6" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $50 to $60 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-7" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="price-range-7" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $60 to $70 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-8" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-8" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $70 to $80 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-9" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-9" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> $80 to $90 </label>
                    </li>
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="price-range-10" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="price-range-10" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Over $100 </label>
                    </li>
                  </ul>
                  <div class="p-2">
                    <button type="button" class="w-full rounded-md bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">See all 100 results</button>
                  </div>
                </div>
                <button id="ratingDropdownButton" data-dropdown-toggle="dropdownRating" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Rating
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
                <!-- Dropdown -->
                <div id="dropdownRating" class="z-50 hidden w-56 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700" data-popper-placement="bottom">
                  <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="rating-checkbox-6" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="rating-checkbox-6" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-0.5">
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
                        (475)
                      </label>
                    </li>
      
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="rating-checkbox-7" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" checked />
                      <label for="rating-checkbox-7" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-0.5">
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
                        (12)
                      </label>
                    </li>
      
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="rating-checkbox-8" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="rating-checkbox-8" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-0.5">
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
                        (20)
                      </label>
                    </li>
      
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="rating-checkbox-9" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="rating-checkbox-9" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-0.5">
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
                        (11)
                      </label>
                    </li>
      
                    <li class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="rating-checkbox-10" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="rating-checkbox-10" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 dark:text-gray-400">
                        <div class="flex items-center gap-0.5">
                          <svg class="h-5 w-5 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                          <svg class="h-5 w-5 text-gray-300 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                          </svg>
                        </div>
                        (6)
                      </label>
                    </li>
                  </ul>
                  <div class="p-2">
                    <button type="button" class="w-full rounded-md bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">See all 100 results</button>
                  </div>
                </div>
                <button id="shippingDropdownButton" data-dropdown-toggle="dropdownShipping" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                  <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                  </svg>
                  Shipping <span class="ms-1 hidden md:flex">to: Americas</span>
                  <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                  </svg>
                </button>
                <!-- Dropdown -->
                <div id="dropdownShipping" class="z-50 hidden w-72 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700" data-popper-placement="bottom">
                  <div class="space-y-3 p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                    <label for="asia-1" class="relative block">
                      <input type="checkbox" name="asia-1" id="asia-1" class="peer absolute left-2 top-2 appearance-none" />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Asia</p>
                        <p class="text-sm font-normal">Delivery for Asia for <span class="font-medium">$954</span></p>
                      </div>
                    </label>
      
                    <label for="africa-1" class="relative block">
                      <input type="checkbox" name="africa-1" id="africa-1" class="peer absolute left-2 top-2 appearance-none" />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Africa</p>
                        <p class="text-sm font-normal">Delivery for Africa for <span class="font-medium">$706,834</span></p>
                      </div>
                    </label>
      
                    <label for="americas-1" class="relative block">
                      <input type="checkbox" name="americas-1" id="americas-1" class="peer absolute left-2 top-2 appearance-none" checked />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Americas</p>
                        <p class="text-sm font-normal">Delivery for USA for <span class="font-medium">$365,35</span></p>
                      </div>
                    </label>
      
                    <label for="australia-1" class="relative block">
                      <input type="checkbox" name="australia-1" id="australia-1" class="peer absolute left-2 top-2 appearance-none" checked />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Australia/Oceania</p>
                        <p class="text-sm font-normal">Delivery for Australia for <span class="font-medium">$209,98</span></p>
                      </div>
                    </label>
      
                    <label for="europe-1" class="relative block">
                      <input type="checkbox" name="europe-1" id="europe-1" class="peer absolute left-2 top-2 appearance-none" />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Europe</p>
                        <p class="text-sm font-normal">Delivery for Europe for <span class="font-medium">$1,365,35</span></p>
                      </div>
                    </label>
      
                    <label for="antarctica-1" class="relative block">
                      <input type="checkbox" name="antarctica-1" id="antarctica-1" class="peer absolute left-2 top-2 appearance-none" />
                      <div class="relative cursor-pointer space-y-1 overflow-hidden rounded-lg border border-gray-200 bg-white p-4 text-gray-500 peer-checked:border-blue-700 peer-checked:bg-blue-50 peer-checked:text-blue-700 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:peer-checked:border-blue-600 dark:peer-checked:bg-blue-900 dark:peer-checked:text-blue-300">
                        <p class="text-sm font-medium">Antarctica</p>
                        <p class="text-sm font-normal">N/A</p>
                      </div>
                    </label>
                  </div>
                  <div class="p-2">
                    <button type="button" class="w-full rounded-md bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">See all 100 results</button>
                  </div>
                </div>
              </div>
              <div class="shrink-0 items-center gap-4 sm:flex">
                <p class="mb-2 text-base font-medium text-gray-900 dark:text-white sm:mb-0">Seller:</p>
      
                <div class="flex flex-wrap items-center gap-3">
                  <div class="flex items-center">
                    <input id="1-year" name="warranty" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                    <label for="1-year" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Flowbite </label>
                  </div>
      
                  <div class="flex items-center">
                    <input id="2-years" type="checkbox" name="warranty" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                    <label for="2-years" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> BestBuy </label>
                  </div>
      
                  <div class="flex items-center">
                    <input id="3-years" type="checkbox" name="warranty" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                    <label for="3-years" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Amazon </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="pt-4">
              <div class="mb-4 items-center md:flex md:justify-between">
                <div class="mb-4 items-center gap-4 sm:flex md:mb-0">
                  <p class="mb-2 shrink-0 text-base font-medium text-gray-900 dark:text-white sm:mb-0">Order by:</p>
      
                  <div class="flex flex-wrap items-center gap-3">
                    <div class="flex items-center">
                      <input id="newest-products" name="order" type="radio" value="" class="h-4 w-4 rounded-full border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="newest-products" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Newest </label>
                    </div>
      
                    <div class="flex items-center">
                      <input id="incr-price" type="radio" name="order" value="" class="h-4 w-4 rounded-full border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="incr-price" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Increasing price </label>
                    </div>
      
                    <div class="flex items-center">
                      <input id="decr-price" type="radio" name="order" value="" class="h-4 w-4 rounded-full border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="decr-price" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Decreasing price </label>
                    </div>
      
                    <div class="flex items-center">
                      <input id="most-popular" type="radio" name="order" value="" class="h-4 w-4 rounded-full border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" />
                      <label for="most-popular" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Most popular </label>
                    </div>
                  </div>
                </div>
                <div class="hidden w-auto items-center rounded-lg border border-gray-200 p-1 dark:border-gray-700 md:flex">
                  <button type="button" data-tooltip-target="tooltip-display-list" class="inline-flex items-center justify-center rounded p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span class="sr-only"> Display list </span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                  </button>
                  <div id="tooltip-display-list" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    Display list
                    <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
                  <button data-tooltip-target="tooltip-display-grid" type="button" data-collapse-toggle="ecommerce-navbar-search-4" class="inline-flex items-center justify-center rounded p-2 text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                    <span class="sr-only"> Display grid </span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"
                      />
                    </svg>
                  </button>
                  <div id="tooltip-display-grid" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    Display grid
                    <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
                </div>
              </div>
              <div class="flex w-full items-center rounded-lg bg-blue-50 p-4 text-sm text-blue-800 dark:bg-gray-700 dark:text-blue-400" role="alert">
                <svg class="me-2 hidden h-6 w-6 md:flex" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 14a3 3 0 0 1 3-3h4a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2h-4a3 3 0 0 1-3-3Zm3-1a1 1 0 1 0 0 2h4v-2h-4Z" clip-rule="evenodd" />
                  <path fill-rule="evenodd" d="M12.293 3.293a1 1 0 0 1 1.414 0L16.414 6h-2.828l-1.293-1.293a1 1 0 0 1 0-1.414ZM12.414 6 9.707 3.293a1 1 0 0 0-1.414 0L5.586 6h6.828ZM4.586 7l-.056.055A2 2 0 0 0 3 9v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2h-4a5 5 0 0 1 0-10h4a2 2 0 0 0-1.53-1.945L17.414 7H4.586Z" clip-rule="evenodd" />
                </svg>
                <span>You have up to $2000 budget available and you can pay up to 12 installments with <a href="#" class="font-medium underline hover:no-underline">FlowWallet</a> see <a href="#" class="font-medium underline hover:no-underline">how it works</a>.</span>
              </div>
            </div>
          </div>

          <!-- PRODUCT CARDS -->
          <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">                
            {{-- Cars List --}}
            @foreach ($cars as $car)
            <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
              <div id="controls-carousel" class="relative w-full" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="relative mb-4 min-h-72 overflow-hidden rounded-lg">
                    @foreach ($car->images() as $image)
                        <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                            <img src="{{ $image->file_path }}" class="absolute left-1/2 top-1/2 block h-full -translate-x-1/2 -translate-y-1/2" alt="..." />
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-center gap-4 -m-4">
                  <button type="button" class="group flex h-full cursor-pointer items-center justify-center rounded-lg p-1.5 hover:bg-gray-50 focus:outline-none dark:hover:bg-gray-800" data-carousel-prev>
                    <span class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                      <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                      </svg>
                      <span class="hidden">Previous</span>
                    </span>
                  </button>
                  <span class="text-sm text-base font-medium text-gray-500 dark:text-gray-400"><span id="carousel-current-item">1</span> of <span id="carousel-total-items">{{ count($car->images()) }}</span></span>
                  <button type="button" class="group flex h-full cursor-pointer items-center justify-center rounded-lg p-1.5 hover:bg-gray-50 focus:outline-none dark:hover:bg-gray-800" data-carousel-next>
                    <span class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                      <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                      </svg>
                      <span class="hidden">Next</span>
                    </span>
                  </button>
                </div>
                <div class="absolute right-0 top-0 p-1 z-50">
                    <button type="button" data-tooltip-target="tooltip-add-to-favorites-9" class="rounded p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      <span class="sr-only"> Add to Favorites </span>
                      <svg class="h-6 w-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                      </svg>
                    </button>
                    <div id="tooltip-add-to-favorites-9" role="tooltip" class="tooltip invisible absolute z-10 inline-block w-[132px] rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-600" data-popper-placement="top">
                      Add to favorites
                      <div class="tooltip-arrow" data-popper-arrow=""></div>
                    </div>
                  </div>
              </div>
      
              <div>
                <a href="" class="text-lg capitalize font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{ $car->name }}</a>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400 text-sm">{{ $car->rating }}</p>
              </div>
           
              <div class="flex items-center justify-between gap-4">
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Mileage: {{ json_decode($car->details, true)['mileage'] }} km</span>
                
                <div class="flex items-center justify-end gap-2">
                    <p class="text-2xl font-semibold leading-tight text-gray-900 dark:text-white">₦ {{ json_decode($car->price, true)['amount'] }}<span class="text-lg">/ day</span></p>

                </div>
              </div>

            </div>
           @endforeach
          </div>
          <!-- Pagination -->
          <nav class="mt-6 flex items-center justify-center sm:mt-8" aria-label="Page navigation example">
            <ul class="flex h-8 items-center -space-x-px text-sm">
              <li>
                <a href="#" class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-e-0 border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <span class="sr-only">Previous</span>
                  <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
              </li>
              <li>
                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
              </li>
              <li>
                <a href="#" aria-current="page" class="z-10 flex h-8 items-center justify-center border border-blue-300 bg-blue-50 px-3 leading-tight text-blue-600 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:hover:bg-gray-700 dark:text-white dark:hover:text-white">3</a>
              </li>
              <li>
                <a href="#" class="z-10 flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
              </li>
              <li>
                <a href="#" class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
              </li>
              <li>
                <a href="#" class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                  <span class="sr-only">Next</span>
                  <svg class="h-4 w-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7" />
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </section>

</x-guest-layout>

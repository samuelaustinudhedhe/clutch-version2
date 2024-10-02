<div id="trip-daterange-picker" date-rangepicker datepicker-autohide class="grid space-y-6 items-center">
  <div class="grid">
      <x-label for="start_time" class="text-sm">Pickup Date</x-label>
      <div class="flex space-x-4">
          <div class="relative w-2/3">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path
                          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
              </div>
              <x-xinput datepicker-autohide  id="datepicker-range-start" name="start" type="text" wire:model.lazy="trip.start.date"
                  class="ps-10 p-2.5" placeholder="Trip start date" />
          </div>
          <x-select class="!w-1/3" wire:model.lazy="trip.start.time">
              <option value="" disabled Selected>--:-- --</option>
              @foreach ($times as $time)
                  <option value="{{ $time }}">{{ $time }}</option>
              @endforeach
          </x-select>
      </div>
  </div>
  <div class="grid">
      <x-label for="end_time" class="text-sm">Drop Off Date</x-label>
      <div class="flex space-x-4">
          <div class="relative w-2/3">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path
                          d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
              </div>
              <x-xinput id="datepicker-range-end" name="end" type="text" wire:model.lazy="trip.end.date"
                  class="ps-10 p-2.5" placeholder="Trip end date" />
          </div>
          <x-select class="!w-1/3" wire:model.lazy="trip.end.time">
              <option value="" disabled Selected>--:-- --</option>
              @foreach ($times as $time)
                  <option value="{{ $time }}">{{ $time }}</option>
              @endforeach
          </x-select>
      </div>
  </div>
</div>
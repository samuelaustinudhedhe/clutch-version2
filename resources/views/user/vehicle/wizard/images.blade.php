<div
class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
<div class="mb-2 flex items-center gap-1">
    <p class="text-lg text-gray-900 dark:text-white">
        Vehicle Gallery
    </p>
</div>

<div class="mb-4">
    {{-- fix responsiveness and implement drag and drop functionality --}}
    <div class="grid grid-cols-3 gap-4 mb-4">
        @foreach ($images['uploaded'] as $index => $image)
            @php
                    // Get image dimensions
                $filePath = Storage::path('public/'.$image['path']) ?? '';
                $dimensions = file_exists($filePath) ? getimagesize($filePath) : ['NA','NA'];
                // Get image file size in bytes
                $fileSizeInBytes = file_exists($filePath) ? filesize($filePath) : 0;

                // Convert size to a more readable format (KB)
                $fileSize = $fileSizeInBytes > 0 ? number_format($fileSizeInBytes / 1024, 2) . ' KB' : 'Size not available';
            @endphp

            <div class="relative rounded-lg sm:w-36 sm:h-36 dark:bg-gray-700 {{  $images['featuredIndex'] === $index ? 'border-4 border-blue-500' : 'border-4 border-transparent' }}"
                title="{{ $images['featuredIndex'] === $index ? 'Featured Image' : 'Dimensions: ' . ($dimensions ? $dimensions[0] . ' x ' . $dimensions[1] . ' px' : 'Dimensions not available') . ', Size: ' . ($fileSize ? $fileSize : 'Size not available') }}"
                wire:click="setFeaturedImage({{ $index }})">
                <img src="{{ Storage::url($image['path']) ?? placeholder('car.png') }}"
                    alt="Vehicle Image {{ $index + 1 }}"
                    class="w-full  rounded-lg h-full object-cover">

                <button type="button" wire:click="removeImage({{ $index }})"
                    class="absolute text-red-600 dark:text-red-500 hover:text-red-500 dark:hover:text-red-400 bottom-1 left-1">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Remove image</span>
                </button>
            </div>
        @endforeach
    </div>

    <div class="flex items-center justify-center w-full">
        <label for="dropzone-image"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                    (MAX. 1MB)</p>
            </div>
            <input id="dropzone-image" type="file" wire:model="images.newUploads" multiple
                class="hidden">
        </label>
    </div>
</div>
<x-input-error for="images" />
</div>
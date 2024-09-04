<div>
    <div class="grid grid-cols-3 gap-4 mb-4">
        @foreach ($documents as $document)
            <div
                class="relative overflow-hidden rounded-lg sm:w-36 sm:h-36 dark:bg-gray-700 border-4 border-transparent">
                @if (str_contains($document['mime_type'], 'pdf'))
                    <embed src="{{ Storage::url($document['path']) }}" type="application/pdf"
                        class="max-w-[156px] max-h-[156px] min-w-[156px] min-h-[156px] rounded-lg" width="156px"
                        height="156px" />
                @else
                    <img src="{{ Storage::url($document['path']) }}" alt="PDF Document"
                        class="max-w-[144px] max-h-[144px] min-w-[144px] min-h-[144px] object-cover" />
                @endif

                <button type="button" wire:click="removeDocument({{ $loop->index }})"
                    class="absolute text-rose-600 dark:text-rose-500 hover:text-rose-500 dark:hover:text-rose-400 bottom-1 left-1 p-1 bg-[#00000063] rounded-lg ">
                    <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Remove document</span>
                </button>
            </div>
        @endforeach
    </div>

    <div class="flex items-center justify-center w-full">
        <label for="dropzone-file"
            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                </p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 5MB)</p>
            </div>
            <input id="dropzone-file" type="file" wire:model="newDocuments" multiple class="hidden">
        </label>
    </div>
</div>

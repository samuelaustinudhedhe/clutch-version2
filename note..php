<?php
<div class="container mx-auto p-4">
<h1 class="text-2xl font-bold mb-4">Order Details</h1>

<x-div class="shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold mb-2">Order #{{ $order->id }}</h2>
    <p class="text-gray-600 mb-4">Placed on: {{ $order->created_at->format('F j, Y, g:i a') }}</p>

    <div class="mb-4">
        <h3 class="text-lg font-semibold">Orderable Item</h3>
        <p class="text-gray-800">
            @if ($order->orderable && $order->orderable_type === 'App\Models\Trip')
                <a href="{{ route('user.trips.show', $order->orderable->id) }}" class="text-blue-500 hover:underline">
                    View Trip #{{ $order->orderable->id }}
                </a>
            @elseif ($order->orderable)
                {{ $order->orderable_type }} #{{ $order->orderable->id }}
            @else
                No associated item
            @endif
        </p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold">Price Details</h3>
        <p class="text-gray-800">Total: {{ $order->price['total'] }} {{ $order->price['currency'] }}</p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold">Payment Status</h3>
        <p class="text-gray-800">{{ ucfirst($order->payment['status']) }}</p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold">Customer Details</h3>
        <p class="text-gray-800">{{ $order->authorable->name }}</p>
        <p class="text-gray-800">{{ $order->authorable->email }}</p>
    </div>

    <div class="mb-4">
        <h3 class="text-lg font-semibold">Additional Details</h3>
        <p class="text-gray-800">{{ $order->details['notes'] ?? 'No additional details' }}</p>
    </div>
    <div class="w-full lg:w-1/2">
        <h3 class="text-lg font-light">Additional Details</h3>
        <div class="gap-2 mt-2">
            @foreach ($order->details ?? [] as $key => $value)
                <p><span class="capitalize opacity-70">{{ str_replace('_', ' ', $key) }}:</span>
                    {{ $value }}</p>
            @endforeach
        </div>
    </div>
</x-div>
<x-div>
    {{-- Featured Image --}}
    <div class="relative">
        <img src="{{ $order->orderable->vehicle->featured_image_url }}"
            class="rounded  min-w-80 w-full min-h-44 h-full object-cover" width="220px" height="180px"
            alt="{{ $order->orderable->vehicle->name }} image" />
    </div>

    {{-- <div class="w-full min-w-0 flex-1 space-y-4 md:max-w-md ">
            <a href="{{ route('vehicles.show', $order->orderable->vehicle->id) }}" target="_blank"
                class="!text-xl font-medium text-gray-900 dark:text-white hover:underline">{{ $order->orderable->vehicle->name }}</a>
        </div> --}}

    <div class="my-8">
        @include('pages.vehicles.show.name', ['vehicle' => $order->orderable->vehicle])
    </div>

    {{-- Details --}}
    @include('pages.vehicles.show.basic-details', ['vehicle' => $order->orderable->vehicle])

    {{-- Host --}}
    @include('pages.vehicles.show.host', ['vehicle' => $order->orderable->vehicle])


</x-div>
</div>

// Resizing the image to the desired dimensions
$resizing = [
    // // thumbnail
    // 'width' => 480,
    // 'height' => 235,
    // // SD
    // 'width' => 720,
    // 'height' => 350,
    // full HD
    // 'width' => 960,
    // 'height' => 470,
    // // 2k HD
    'width' => 1440,
    'height' => 700,
    // //4k HD
    // 'width' => 2880,
    // 'height' => 1400,
    'type' => 'coverDown',
    'option' => [
        'position' => 'center'
    ]
];


/**
 * Saves attachments related to a vehicle, including images and documents, to storage.
 *
 * This function processes uploaded files, saves them to the appropriate storage locations,
 * and associates them with the given user and vehicle. It handles both images and documents,
 * ensuring that only valid insurance documents are saved.
 *
 * @param User|Admin $user The user or admin who is uploading the attachments.
 * @param Vehicle $vehicle The vehicle to which the attachments are related.
 * @return void
 */
public function saveAttachments(User|Admin $user, Vehicle $vehicle)
{
    // Get the upload files details using the function because the variable data is not updated at this point
    $files = $this->getStoredData()['files'];

    // Process images
    foreach ($files['images'] as $index => $image) {
        // Generate a unique hash name for the image as the new name
        $hashName = Str::random(40);

        if (isset($image['path']) && Storage::exists('public/' . $image['path'])) {
            // Determine if the current image is the featured image using the featured index
            $featured = $index === $this->images['featuredIndex'] ? true : false;

            // Set the name key based on whether the image is featured or a gallery image
            $nameKey = $featured ? Attachment::TYPE_IMAGE : Attachment::TYPE_GALLERY_IMAGE;

            // Retrieve the document name based on the name key
            $imageName = $this->getDocName($nameKey);

            // Appending the index in words if it's a gallery image
            $toWord = ($nameKey === Attachment::TYPE_GALLERY_IMAGE ? numberToWords($index) : '');

            // Generate the image name, appending the index in words if it's a gallery image
            $name = "{$vehicle->name}'s {$imageName} " . $toWord;

            // Generate the image description, including the user's name, index in words, and vehicle details
            $description = "{$user->name}'s " . $toWord . " {$imageName} of {$vehicle->name} - {$vehicle->description}";

            // Resizing the image to the desired dimensions
            $resizing = [
                'width' => 1440, // Set the width of the image to 1440 pixels
                'height' => 700, // Set the height of the image to 700 pixels
                'type' => 'coverDown', // Specify the resizing type as 'coverDown'
                'option' => [
                    'position' => 'center' // Center the image during resizing
                ]
            ];

            // Save the image to the storage, update the user profile image and attach it with the user Via attachable
            Upload::Image(
                name: $name, // The name of the image
                description: $description, // The description of the image
                image: Storage::path('public/' . $image['path']), // The path to the image in storage
                mimeType: $image['mime_type'], // The MIME type of the image
                is_featured: $featured, // Boolean indicating if the image is featured
                type: $featured ? Attachment::TYPE_IMAGE : Attachment::TYPE_GALLERY_IMAGE, // Determine the type based on whether it's featured
                resizing: $resizing, // The resizing options for the image
                quality: 90, // The quality of the image after processing
                authorable: $user, // The user who is the author of the image
                attachable: $vehicle, // The vehicle to which the image is attached
                path: "public/vehicles/{$vehicle->id}/{$hashName}.webp", // The path where the image will be saved
            );

            // Delete the uploaded photo after saving it to the storage
            Storage::delete('public/' . $image['path']); // Remove the original uploaded image from storage
            unset($this->storeData['files']['images'][$index]); // Remove the image entry from the stored data
        }
    }

    // Process Document
    foreach ($files as $key => $file) {

        if ($key === 'images' || ($key === 'insurance' && (!isset($this->getStoredData()['documents']['insurance']['status']) || $this->getStoredData()['documents']['insurance']['status'] !== 'valid'))) {
            // Skip saving if the insurance document is not valid or if the key is 'images'
            continue;
        }

        // Save uploaded files to the storage and attach them with the user Via attachable
        if (isset($file['path']) && Storage::exists('public/' . $file['path'])) {
            // Generate a unique hash name for the file as the new name
            $hashName = Str::random(30);

            //Get the document storage path
            $storagePath = $this->getStorage('private', $user->id) . "documents/vehicles/{$vehicle->id}";

            // Get the Mimetype of the file
            $mime_type = $file['mime_type'];

            // Check if the file is a valid PDF or image
            $is_pdf = in_array($mime_type, Attachment::$documentMimeTypes);

            // Define the document keyName based on the file key
            $keyName =  $this->getFileName("{$key}_document");

            // Define the file extension based on the file type
            $path =  $is_pdf ? "{$storagePath}/{$hashName}.pdf" : "{$storagePath}/{$hashName}.webp";

            // Generate the document name and description based on the user's name and vehicle details
            $docName = "{$keyName} for {$vehicle->name}";
            $docDesc = "{$user->name}'s {$docName}";

            // Save the document to the storage and attach it with the user Via attachable
            $documents = Upload::file(
                name: $docName,
                description: $docDesc,
                file: Storage::path('public/' . $file['path']),
                mimeType: $mime_type,
                is_featured: true,
                type: Attachment::TYPE_DOCUMENT,
                authorable: $user,
                attachable: $user,
                path: $path,
            );

            //update the vehicles documents array with the newly created document id
            updateVehicle($vehicle->id, ["documents->{$key}->id" => $documents->id]);

            // Delete the uploaded file after saving it to the storage
            Storage::delete('public/' . $file['path']);
            unset($this->storeData['files'][$key]);
        }
        // Update the stored data after saving files to the designated storages
        $this->putData($this->storeData);
    }
}





    /**
     * Handle the upload and validation of multiple image files.
     *
     * @return void
     */
    public function updatedImages()
    {
        // Validate each new image
        foreach ($this->images['newUploads'] as $newImage) {
            $fileName = $newImage->getClientOriginalName(); // Get original file name
            $error = '';

            // Validate if the file is a valid image
            if (strpos($newImage->getMimeType(), 'image/') === false) {
                $error = "The file " . $fileName . " is not a valid image.";
            }
            // Validate the file size (1MB limit)
            elseif ($newImage->getSize() > 1024 * 1024 * 4) {
                $error = "The file " . $fileName . " exceeds the maximum size of 2MB.";
            }
            // Check if the image already exists
            else {
                $imageHash = md5_file($newImage->getRealPath()); // Generate image hash

                $alreadyExists = false;
                foreach ($this->images['uploaded'] as $image) {
                    if ($image['hash'] === $imageHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The image " . $fileName . " already exists.";
                } else {

                    $filePath = $newImage->store("tmp", 'public');

                    if (!isset($this->storeData['files']['images'])) {
                        $this->storeData['files']['images'] = [];
                    }

                    // Save file details to the JSON file
                    $this->storeData['files']['images'][] = [
                        'path' => $filePath,
                        'mime_type' => $newImage->getMimeType(),
                        'size' => $newImage->getSize(),
                        'hash' => $imageHash
                    ];

                    $this->deleteFile($newImage);
                    Storage::put($this->storePath, json_encode($this->storeData));

                    $this->images['uploaded'] = $this->storeData['files']['images']; // Add image to the images array
                }
            }

            // Add the error to the error message array if not already present
            if ($error && !in_array($error, $this->images['errors'])) {
                $this->images['errors'][] = $error;
            }
        }

        // Dispatch a notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->images['errors']), 'warning');

        // Clear the temporary images['new'] property
        $this->images['new'] = [];
    }

    /**
     * Sets the featured image based on the provided index number.
     *
     * @param int $index The index of the image to be set as featured.
     * @return void
     */
    public function setFeaturedImage($index)
    {
        $this->images['featuredIndex'] = $index;
    }

    /**
     * Removes an image from the images array and deletes the file from storage.
     *
     * @param int $index The index of the image to be removed.
     * @return void
     */
    public function removeImage($index)
    {
        $files = $this->images['uploaded']; // Get the images array
        $filePath = Storage::path('public/' . $files[$index]['path']); // Get the file path

        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file from storage
        }
        array_splice($files, $index, 1);
        $this->images['uploaded'] = $files; // Update the images array in the storeData property
        $this->storeData['files']['images'] = $this->images['uploaded']; // Update the images array in the storeData property
        Storage::put($this->storePath, json_encode($this->storeData));
    }

    /**
     * Handle the update and validation of a file.
     *
     * This function validates the newly uploaded file, resets the file input,
     * and reinitializes the uploaded file data.
     *
     * @param string $type The type of file being updated (e.g., 'registration', 'insurance', 'proofOfOwnership').
     * @param string $label The label for the file type used in validation messages.
     * @return void
     */
    public function updatedFile($type, $label, $key = '', $messages = [])
    {
        // Set the key for uploaded file data
        $key = $key ?: $type;

        // Validate the type of file
        $this->validate(
            ["{$type}.new" => 'required|file|max:1024|mimes:jpeg,png,jpg,gif,pdf'],
            $messages,
            ["{$type}.new" => $label]
        );

        $path = $this->{$type}['uploaded']['path'] ?? null;
        $new = $this->{$type}['new'] ?? null;

        // Optionally reset file input
        $this->reset($type);
        $this->{$type}['new'] = [];

        // Reinitialize the uploaded file data
        $this->{$type}['uploaded'] = $this->uploadFile($key, $new, $path);
    }

    /**
     * Handle the update of the registration file.
     *
     * This function is triggered when the registration file is updated.
     * It validates the new registration file, resets the file input,
     * and reinitializes the uploaded registration file data.
     *
     * @return void
     */
    public function updatedRegistration()
    {
        $this->updatedFile('registration', 'Registration');
    }

    /**
     * Handle the update of the insurance file.
     *
     * This function is triggered when the insurance file is updated.
     * It validates the new insurance file, resets the file input,
     * and reinitializes the uploaded insurance file data.
     *
     * @return void
     */
    public function updatedInsurance()
    {
        $this->updatedFile('insurance', 'Insurance');
    }

    /**
     * Handle the update of the proof of ownership file.
     *
     * This function is triggered when the proof of ownership file is updated.
     * It validates the new proof of ownership file, resets the file input,
     * and reinitializes the uploaded proof of ownership file data.
     *
     * @return void
     */
    public function updatedProofOfOwnership()
    {
        $this->updatedFile('proofOfOwnership', 'Proof Of Ownership', 'proof_of_ownership');
    }

    public function submit()
    {
        $data = $this->storeData;
        $user = $this->user;
        // make user the default chauffeur if not provided and the chauffeur if none is found
        $defaultChauffeur = [
            'name' => $user->name,
            'phone' => [
                'home' => formatPhone($user->phone, type: 'home'),
                'work' => formatPhone($user->phone, type: 'work')
            ],
            'email' => $user->email
        ];
        // set currency if none is set
        isset($data['price']['currency']) ?:  $data['price']['currency']  = app_currency(false);
        // Set the default chauffeur if none is provided
        $chauffeur = isset($data['has_chauffeur']) ? $data['chauffeur'] : $defaultChauffeur;

        // Ensure the name is constructed correctly
        $vehicleName = trim($data['details']['make'] . ' ' . $data['details']['model'] . ' ' . $data['details']['year']);

        // Final submission: Create the vehicle in the database
        $vehicle = Vehicle::create([
            'name' => $vehicleName,
            'price' => $data['price'],
            'status' => 'pending',
            'location' => $data['location'],
            'details' => $data['details'],
            'documents' => $data['documents'],
            'chauffeur' => $chauffeur,
            'ownerable_id' => $user->id,
            'ownerable_type' => get_class($user)
        ]);
        // Use the associate method to automatically handle ownerable_id and ownerable_type
        $vehicle->ownerable()->associate($user); // not necessary in this case? why the fuck not its not hurting any one
        $this->saveAttachments($user, $vehicle);
        $vehicle->save();

        // Clear the stored data after submission
        //Storage::delete("Users/" . getUser()->id . "/vehicle.json");

        // Redirect or reset after successful submission
        return redirect()->route('vehicles.index');
    }

    protected function saveAttachments(User|Admin $user, Vehicle $vehicle)
    {
        // Get the upload files details using the function because the variable data is not updated at this point
        $files = $this->getStoredData()['files'];

        foreach ($files['images'] as $index => $image) {
            // Generate a unique hash name for the image
            $hashName = Str::random(40);

            if (isset($image['path']) && Storage::exists('public/' . $image['path'])) {
                // get the featured image using the featured index
                $featured = $index === $this->images['featuredIndex'] ? true : false;
                // Generate the image name ans description.
                $name = $vehicle->name . '\'s Gallery Image ' . numberToWords($index);
                $description = $user->name . '\'s ' . numberToWords($index, true) . " Gallery Image of {$vehicle->name} - {$vehicle->description}";
                $resizing = [
                    // // thumbnail
                    // 'width' => 480,
                    // 'height' => 235,
                    // // SD
                    // 'width' => 720,
                    // 'height' => 350,
                    // full HD
                    // 'width' => 960,
                    // 'height' => 470,
                    // // 2k HD
                    'width' => 1440,
                    'height' => 700,
                    // //4k HD
                    // 'width' => 2880,
                    // 'height' => 1400,
                    'type' => 'coverDown',
                    'option' => [
                        'position' => 'center'

                    ]
                ];
                // Save the image to the storage, update the user profile image and attach it with the user Via attachable
                Upload::Image(
                    name: $name,
                    description: $description,
                    image: Storage::path('public/' . $image['path']),
                    mimeType: $image['mime_type'],
                    is_featured: $featured,
                    type: $featured ? Attachment::TYPE_IMAGE : Attachment::TYPE_GALLERY_IMAGE,
                    resizing: $resizing,
                    quality: 90,
                    authorable: $user,
                    attachable: $vehicle,
                    path: "public/vehicles/{$vehicle->id}/{$hashName}.webp",
                );

                // Delete the uploaded photo after saving it to the storage
                Storage::delete('public/' . $image['path']);
                unset($this->storeData['files']['images'][$index]);
            }
        }
        foreach ($files as $key => $file) {

            if ($key === 'images' || ($key === 'insurance' && (!isset($this->getStoredData()['documents']['insurance']['status']) || $this->getStoredData()['documents']['insurance']['status'] !== 'valid'))) {
                // Skip saving if the insurance document is not valid or if the key is 'images'
                continue;
            }

            // Save uploaded files to the storage and attach them with the user Via attachable
            if (isset($file['path']) && Storage::exists('public/' . $file['path'])) {
                // Check if the insurance document is valid before saving

                $storagePath = getUserStorage('private', $user->id) . 'documents/vehicles/' . $vehicle->id;
                $mime_type = $file['mime_type'];
                $path = str_contains($mime_type, 'image') ? $storagePath . $key . '.webp' : $storagePath . $key . '.pdf';
                $docName = $this->getDocName($key) . ' for ' . $vehicle->name;
                $docDesc = $user->name . '\'s ' . $docName;

                // Save the document to the storage and attach it with the user Via attachable
                $documents = Upload::file(
                    name: $docName,
                    description: $docDesc,
                    file: Storage::path('public/' . $file['path']),
                    mimeType: $mime_type,
                    is_featured: true,
                    type: Attachment::TYPE_DOCUMENT,
                    authorable: $user,
                    attachable: $user,
                    path: $path,
                );

                //update the vehicles documents array with the newly created document id
                update(
                    'vehicles',
                    $vehicle->id,
                    [
                        "documents->{$key}->id" => $documents->id
                    ]
                );

                // Delete the uploaded file after saving it to the storage
                Storage::delete('public/' . $file['path']);
                unset($this->storeData['files'][$key]);
            }
            // Update the stored data after saving files to the designated storages
            $this->putData($this->storeData);
        }
    }

    /**
     * Get the document name based on the document type.
     *
     * @param string $docType The type of the document.
     * @return string The name of the document.
     */
    protected function getDocName(string $fileType): string
    {
        $fileNames = [
            'images' => 'Gallery Images',
            'insurance' => 'Insurance Document',
            'registration' => 'Vehicle Registration',
            'proof_of_ownership' => 'Proof of Ownership',
            // Add more document types and their corresponding names as needed
        ];

        return $fileNames[$fileType] ?? 'Vehicle File';
    
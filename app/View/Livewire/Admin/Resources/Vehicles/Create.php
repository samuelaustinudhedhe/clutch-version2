<?php

namespace App\View\Livewire\Admin\Resources\Vehicles;

use App\Http\Controllers\Attachments\AttachmentCompressController;
use App\Http\Controllers\Attachments\AttachmentController;
use App\Models\Vehicle;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\WithFileUploads;
use App\Http\Controllers\Attachments\AttachmentUploadController as Upload;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

class Create extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $vin;
    public $vit;
    public $vits = [];
    public $status;
    public $vehicleTypes = [];
    public $vehicleSubTypes = [];
    public $selectedVehicleSubType;
    public $selectedVehicleType;
    public $vehicleDetails = [];
    //Images for the vehicle
    public $images = [];
    public $newImages = [];
    public $imageErrorMessage = [];
    public $featuredImageIndex = 0;

    // Vehicle Documents
    public $documents = [];
    public $newDocuments = [];
    public $documentErrorMessages = [];

    //Vehicle Owner
    public $owner;
    public $selectedUser;
    //filters
    public $userSearch = '';
    public $usersPerPage = 10;

    public $rules = [];

    public function mount()
    {
        $this->vehicleTypes = Vehicle::types();
        $this->vits = Vehicle::$vits;
    }

    public function getOwner()
    {
        if (!empty($this->selectedUser)) {
            return getUser(user: $this->selectedUser);
        }
        return getUser() ?? getAdmin();
    }

    public function updatedNewImages()
    {
        // Validate the new images
        foreach ($this->newImages as $newImage) {
            $fileName = $newImage->getClientOriginalName();
            $error = '';

            // Check if the file is a valid image
            if (getimagesize($newImage->getRealPath()) === false) {
                $error = "The file " . $fileName . " is not a valid image.";
            }
            // Validate the file size
            elseif ($newImage->getSize() > 1024 * 1024) { // 1MB
                $error = "The file " . $fileName . " exceeds the maximum size of 1MB.";
            }
            // Check if the image already exists by generating a unique hash
            else {
                $imageHash = md5_file($newImage->getRealPath());

                $alreadyExists = false;
                foreach ($this->images as $image) {
                    if (md5_file($image->getRealPath()) === $imageHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The image " . $fileName . " already exists.";
                } else {
                    $this->images[] = $newImage;
                }
            }

            // Check if the error is already in the array, and add it if not
            if ($error && !in_array($error, $this->imageErrorMessage)) {
                $this->imageErrorMessage[] = $error;
            }
        }

        // Dispatch notification with all aggregated errors
        $this->dispatch('notify', implode('<br>', $this->imageErrorMessage), 'warning');

        // Clear the temporary newImages property
        $this->newImages = [];
    }


    public function updatedNewDocuments()
    {
        foreach ($this->newDocuments as $newDocument) {
            $fileName = $newDocument->getClientOriginalName();
            $error = '';

            // Validate the file type
            if ($newDocument->getClientOriginalExtension() !== 'pdf') {
                $error = "The file " . $fileName . " is not a valid PDF document.";
            }
            // Validate the file size
            elseif ($newDocument->getSize() > 1024 * 1024 * 5) { // 5MB limit
                $error = "The file " . $fileName . " exceeds the maximum size of 5MB.";
            } else {
                // // Store the PDF in the 'public' disk
                // $storedPath = $newDocument->store('tmp', 'public');

                // // Add the document's path to the list
                // $this->documents[] = [
                //     'name' => $fileName,
                //     'path' => $storedPath,
                //     'file' => $newDocument,
                // ];
                $documentHash = md5_file($newDocument->getRealPath());

                $alreadyExists = false;
                foreach ($this->documents as $document) {
                    // Correctly access the 'file' key to get the file object
                    if (md5_file($document['file']->getRealPath()) === $documentHash) {
                        $alreadyExists = true;
                        break;
                    }
                }

                if ($alreadyExists) {
                    $error = "The document " . $fileName . " already exists.";
                } else {
                    // Save the PDF and generate a thumbnail preview (optional)
                    $storedPath = $newDocument->store('tmp', 'public');
                    // Store the document information with thumbnail path

                    $this->documents[] = [
                            'name' => $fileName,
                            'path' => $storedPath,
                            'file' => $newDocument,
                        ];
                }
            }

            // If there was an error, add it to the errorMessages array
            if ($error && !in_array($error, $this->documentErrorMessages)) {
                $this->documentErrorMessages[] = $error;
            }
        }
        $this->dispatch('notify', implode('<br>', $this->documentErrorMessages), 'warning');

        // Clear the temporary newDocuments property
        $this->newDocuments = [];
    }




    public function setFeaturedImage($index)
    {
        $this->featuredImageIndex = $index;
    }

    public function removeImage($index)
    {
        // Remove the selected image from the images array
        array_splice($this->images, $index, 1);
    }

    private function storeVehicleImages(User $user, Vehicle $vehicle)
    {
        foreach ($this->images as $image) {

            $folder = 'users/' . toSlug($user->name, '-') . '-' . $user->id . '/vehicles/' . toSlug($vehicle->name) . '/images';
            $filename = toSlug($vehicle->name) . '.webp';

            $is_featured = ($this->featuredImageIndex === array_search($image, $this->images));

            $path = Upload::image($user, $image->getRealPath(), $folder, $filename, 'resize', 200, 200, attachable: $vehicle);

            AttachmentController::makeDir($path);

            $image = (new AttachmentCompressController)->read($image);

            $encodedImage = AttachmentCompressController::image($image, 'jpg', 80);

            AttachmentController::store($path, $encodedImage);

            AttachmentController::create(
                $vehicle->name,
                $vehicle->description,
                $encodedImage,
                $vehicle,
                $user,
                $path,
                $is_featured
            );
        }
        // Update user profile picture path
        $user->profile_photo_path = $path;
        $user->save();
    }



    public function removeDocument($index)
    {
        // Remove the document from the list
        unset($this->documents[$index]);
        $this->documents = array_values($this->documents); // Reindex array
    }



    public function saveVehicle()
    {
        $this->validate([
            'vin' => 'required|size:17',
            'selectedVehicleType' => 'required',
            'selectedVehicleSubType' => 'required',
            // Add other validation rules as needed
        ]);

        $vehicle = new Vehicle();
        $vehicle->vin = $this->vin;
        $vehicle->type = $this->selectedVehicleType;
        $vehicle->sub_type = $this->selectedVehicleSubType;
        // Set other vehicle properties as needed

        $vehicle->save();

        $this->storeVehicleImages($this->getOwner(), $vehicle);
        $this->storeVehicleDocuments($this->getOwner(), $vehicle);


        session()->flash('success', 'Vehicle created successfully.');
        return redirect()->route('admin.vehicles.index');
    }

    public function getVehicleDetails()
    {
        $this->validate([
            'vin' => 'required|size:17', // VIN is typically 17 characters
        ]);

        try {
            $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/{$this->vin}?format=json");

            if ($response->successful()) {
                $data = $response->json();
                $this->vehicleDetails = $this->parseVehicleDetails($data['Results']);
                $this->errorMessage = null;
            } else {
                $this->vehicleDetails = null;
                $this->errorMessage = 'Vehicle details could not be fetched.';
            }
        } catch (\Exception $e) {
            $this->vehicleDetails = null;
            $this->errorMessage = 'An error occurred while fetching vehicle details.';
        }
    }

    private function parseVehicleDetails($results)
    {
        $details = [];

        foreach ($results as $result) {
            $variable = $result['Variable'] ?? '';
            $value = $result['Value'] ?? 'N/A';

            // Sanitize the variable name by replacing spaces and special characters with underscores
            $sanitizedVariable = preg_replace('/[^a-zA-Z0-9]/', '_', $variable);

            // Convert the sanitized variable name to lowercase
            $sanitizedVariable = strtolower($sanitizedVariable);

            // Store the sanitized and lowercase variable name as the key
            $details[$sanitizedVariable] = $value;
        }

        return $details;
    }


    // public function mount()
    // {
    //     $this->fetchMakes();
    // }

    // public function fetchMakes()
    // {
    //     $response = Http::get('https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json');
    //     $this->makes = $response->json()['Results'];
    // }

    // public function updatedSelectedMake($makeId)
    // {
    //     $this->fetchModels($makeId);
    // }

    // public function fetchModels($makeId)
    // {
    //     $response = Http::get("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/$makeId?format=json");
    //     $this->models = $response->json()['Results'];
    // }


    public function render()
    {
        $users = User::search('name', $this->userSearch)->where('role', 'owner')->paginate($this->usersPerPage);
        return view(
            'admin.resources.vehicle.create',
            [
                'users' => $users,

            ]
        )->layout('layouts.admin');
    }
}

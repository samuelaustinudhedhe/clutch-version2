<?php

namespace App\Http\Controllers\Attachments;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Exceptions\DecoderException;

class AttachmentController extends Controller
{

    /**
     * Reads an image from various sources using the specified driver.
     *
     * This function utilizes the Intervention Image library to read an image
     * from file paths, binary data, base64-encoded data, Data URI, or other supported sources.
     * The function supports optional custom decoders for specific input formats.
     *
     * @param mixed $input The image source (e.g., file path, binary data, base64).
     * @param array|string|null $decoders (optional) Decoders to process the input data.
     *        This can be a string, array of decoder class names, or DecoderInterface instance(s).
     *        If not specified, it will use default decoders based on the input.
     * @param string $driverType (optional) The image processing driver to use ('gd' or 'imagick').
     *        Defaults to 'gd'.
     *
     * @return \Intervention\Image\Image The image resource created from the input.
     *
     * @throws \Intervention\Image\Exception\DecoderException If the input cannot be decoded.
     */
    public function read($input, $decoders = null, $driverType = 'gd')
    {
        // Choose driver based on the provided type ('gd' or 'imagick')
        $driver = ($driverType === 'imagick')
            ? new ImagickDriver()
            : new GdDriver();

        // Create a new ImageManager with the selected driver
        $manager = new ImageManager($driver);

        try {
            // If decoders are provided, pass them while reading the image
            if (!empty($decoders)) {
                $image = $manager->read($input, $decoders);
            } else {
                // Use default decoding mechanism
                $image = $manager->read($input);
            }

            return $image;
        } catch (DecoderException $e) {
            // Handle decoding exception, maybe log or rethrow as necessary
            throw $e;
        }
    }


    /**
     * Resizes an image based on the provided type, width, and height.
     *
     * This function supports various resizing methods like 'resize', 'resizeDown', 
     * 'scale', 'scaleDown', 'cover', 'coverDown', 'pad', 'contain', 'crop', etc.
     * It maintains the aspect ratio, optionally pads, crops, or scales the image.
     *
     * @param \Intervention\Image\Image $image The image to be resized.
     * @param string $type The type of resizing to be applied (e.g., 'resize', 'cover').
     * @param int|null $width The target width for the resized image.
     * @param int|null $height The target height for the resized image.
     * @param array $options Additional options like position, background color, tolerance, etc.
     *
     * @return \Intervention\Image\Image Resized image instance.
     */
    public static function resizing($image, $type, ?int $width = null, ?int $height = null, array $options = [])
    {
        if (!empty($type)) {
            switch ($type) {
                case 'resize':
                    // Basic resize, stretches the image
                    return $image->resize(width: $width, height: $height);

                case 'resizeDown':
                    // Resize without exceeding original size
                    return $image->resizeDown(width: $width, height: $height);

                case 'scale':
                    // Proportional resizing while maintaining aspect ratio
                    return $image->scale(width: $width, height: $height);

                case 'scaleDown':
                    // Proportional scaling but not exceeding original size
                    return $image->scaleDown(width: $width, height: $height);

                case 'cover':
                    // Crop & resize to cover area, optional position
                    $position = $options['position'] ?? 'center';
                    return $image->cover($width, $height, $position);

                case 'coverDown':
                    // Cover resizing without exceeding original size
                    $position = $options['position'] ?? 'center';
                    return $image->coverDown($width, $height, $position);

                case 'pad':
                    // Resize padded, optional background color and position
                    $background = $options['background'] ?? 'ffffff00';
                    $position = $options['position'] ?? 'center';
                    return $image->pad($width, $height, $background, $position);

                case 'contain':
                    // Resize padded with upscaling
                    $background = $options['background'] ?? 'ffffff00';
                    $position = $options['position'] ?? 'center';
                    return $image->contain($width, $height, $background, $position);

                case 'crop':
                    // Crop the image to given width and height, optional offset and position
                    $offset_x = $options['offset_x'] ?? 0;
                    $offset_y = $options['offset_y'] ?? 0;
                    $position = $options['position'] ?? 'top-left';
                    $background = $options['background'] ?? 'ffffff00';
                    return $image->crop($width, $height, $offset_x, $offset_y, $background, $position);

                case 'resizeCanvas':
                    // Resize canvas, optional background color and position
                    $background = $options['background'] ?? 'ffffff00';
                    $position = $options['position'] ?? 'center';
                    return $image->resizeCanvas($width, $height, $background, $position);

                case 'resizeCanvasRelative':
                    // Resize canvas with relative dimensions
                    $background = $options['background'] ?? 'ffffff00';
                    $position = $options['position'] ?? 'center';
                    return $image->resizeCanvasRelative($width, $height, $background, $position);

                case 'trim':
                    // Trim similar-colored borders with optional tolerance
                    $tolerance = $options['tolerance'] ?? 0;
                    return $image->trim($tolerance);

                default:
                    throw new \InvalidArgumentException("Unsupported resize type: $type");
            }
        }

        throw new \InvalidArgumentException('Type is required for resizing.');
    }


    /**
     * Creates a directory on the specified disk.
     *
     * This function uses Laravel's Storage facade to create a directory on the specified disk.
     * If the directory already exists, no action is taken.
     *
     * @param string $directory The directory path to be created.
     * @param string $disk The name of the disk where the directory will be created. Defaults to 'public'.
     *
     * @return void
     */
    public static function makeDir(string $directory, string $disk = 'public')
    {
        // Use Laravel's Storage facade to create the directory on the specified disk.
        if (!Storage::disk($disk)->exists($directory)) {
            Storage::disk($disk)->makeDirectory($directory);
        }
    }

    /**
     * Retrieves the absolute path of a file from the specified disk.
     *
     * This function uses Laravel's Storage facade to retrieve the file path from the specified disk.
     * The function returns the absolute path of the file.
     *
     * @param string $disk The name of the disk where the file is located.
     * @param string $path The path of the file relative to the disk's root directory.
     *
     * @return string The absolute path of the file.
     */
    public static function readPath($disk, $path)
    {

        // It uses Laravel's Storage facade to retrieve the file path from the specified disk.
        // The function returns the absolute path of the file.
        return Storage::disk($disk)->path($path);
    }

    /**
     * Stores a file on the specified disk at the given path and returns the full path to the file.
     *
     * @param string $path The path where the file will be stored on the disk.
     * @param mixed $file The file to be stored. This can be a file path, a stream resource, or an instance of UploadedFile.
     * @param string $disk The name of the disk where the file will be stored. Defaults to 'public'.
     *
     * @return string The full path to the stored file.
     */
    public static function store(string $path, $file, $mimeType, $return = false)
    {
        // Ensure the path does not include "storage" at the beginning
        $path = preg_replace('/^.*\/storage\//', '', $path);

        // Check if the file is a PDF
        if (str_contains($mimeType, 'pdf')) {
            // Store the PDF file and get the full path
            Storage::put($path, file_get_contents($file));
        } else {
            // Store the file and get the full path
            Storage::put($path, $file);
        }

        // Return the full path to the stored file
        if ($return) {
            return Storage::path($path);
        }
    }


    /**
     * Create a new Attachment.
     *
     * @param string $name The name of the Attachment.
     * @param string $description The description of the Attachment.
     * @param \Illuminate\Http\UploadedFile $file The uploaded file.
     * @param object $attachable The model that the Attachment is attached to.
     * @param object $authorable The model that created the Attachment.
     * @param string $path The file path of the Attachment.
     *
     * @return void
     */
    public static function create($name, $description, $file, $mimeType, $is_featured = false, $attachable, $authorable, $path)
    {
        // Get the MIME type of the file
        $fileInfo =  getimagesize($file);

        // $exif = null;
        // if (!in_array($fileInfo['mime'], ['image/png', 'image/jpeg', 'image/gif'])) {
        //     $exif = exif_read_data($file);
        // }
        $width = $fileInfo[0] ?? null;
        $height = $fileInfo[1] ?? null;
        $ratio = ($height > 0) ? ($width / $height) : null; // Add condition to check if height is not zero before performing division
        $dimension = '';
        if ($fileInfo)
            $dimension = [
                'width' => $width,
                'height' => $height,
                'ratio' => $ratio,
            ];
        // Collect metadata about the file
        $metadata = [
            'size' => filesize($file),
            $dimension
            // 'exif' => $exif ?: null,
        ];

        // Create the Attachment using the raw method
        self::createRaw(
            $name,
            $description,
            'active',
            $is_featured,
            $metadata,
            $mimeType,
            $attachable,
            $authorable,
            $path
        );
    }

    /**
     * Create a new Attachment without processing the file.
     *
     * @param string $name The name of the Attachment.
     * @param string $description The description of the Attachment.
     * @param string $active The status of the Attachment.
     * @param bool $is_featured Whether the Attachment is is_featurable.
     * @param array $metadata The metadata of the Attachment.
     * @param string $mime_type The MIME type of the Attachment.
     * @param object $attachable The model that the Attachment is attached to.
     * @param object $authorable The model that created the Attachment.
     * @param string $path The file path of the Attachment.
     *
     * @return void
     */
    public static function createRaw(string $name, string $description, string $active, bool $is_featured, array $metadata, string $mimeType, object $attachable, object $authorable, string $path)
    {
        // Create the Attachment record in the database
        Attachment::create([
            'name' => $name,
            'description' => $description,
            'status' => $active,
            'is_featured' => $is_featured,
            'metadata' => json_encode($metadata),
            'mime_type' => $mimeType,
            'attachable_id' => $attachable->id,
            'attachable_type' => get_class($attachable),
            'authorable_id' => $authorable->id,
            'authorable_type' => get_class($authorable),
            'file_path' => $path,
        ]);
    }
}

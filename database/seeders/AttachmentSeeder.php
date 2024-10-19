<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attachment;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create regular attachments
        //Attachment::factory(2000)->create();

        // Create placeholder attachments
        $this->createPlaceholders();
    }

    /**
     * Create placeholder attachments in the database.
     *
     * @return void
     */
    protected function createPlaceholders()
    {
        $placeholderTypes = [
            'default_image_placeholder' => 'image/png',
            'default_car_placeholder' => 'image/png',
            'default_document_placeholder' => 'application/pdf',
            'default_video_placeholder' => 'video/mp4',
            'default_gallery_placeholder' => 'image/png',
            'default_audio_placeholder' => 'audio/mpeg',
        ];

        foreach ($placeholderTypes as $type => $mimeType) {
            $placeholder = $this->generatePlaceholderData($type, $mimeType);
            Attachment::updateOrCreate(
                ['type' => $placeholder['type']],
                $placeholder
            );
        }
    }

    /**
     * Generate placeholder data.
     *
     * @param string $type
     * @param string $mimeType
     * @return array
     */
    protected function generatePlaceholderData($type, $mimeType)
    {
        return [
            'name' => ucfirst(str_replace('_', ' ', $type)),
            'type' => $type,
            'file_path' => "/assets/images/placeholders/{$type}.svg",
            'mime_type' => $mimeType,
            'description' => "Placeholder for " . str_replace('_', ' ', $type),
            'status' => 'active',
            'is_featured' => true,
            'metadata' => json_encode(['width' => 100, 'height' => 100]),
            'attachable_type' => 'App\Models',
            'attachable_id' => 1,
            'authorable_type' => 'App\Models\Admin',
            'authorable_id' => 1,
        ];
    }
}
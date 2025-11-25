<?php

namespace App\Services;

use Cloudinary\Cloudinary;

class CloudinaryService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('app.cloudinary.cloud_name'),
                'api_key' => config('app.cloudinary.api_key'),
                'api_secret' => config('app.cloudinary.api_secret'),
            ]
        ]);
    }

    public function uploadUserProfileImage($file, $folder = '/profile_photos'): array
    {
        $cloudFolder = "petsvet/{$folder}";

        $publicId = '/user_' . auth()->id() . '_' . time();

        $result = $this->cloudinary->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => $cloudFolder,
                'public_id' => $publicId,
            ]
        );

        return [
            'url' => $result['secure_url'] ?? null,
            'public_id' => $result['public_id'] ?? null,
        ];
    }

    public function deleteUserProfileImage($publicId): void
    {
        if ($publicId) {
            $this->cloudinary->uploadApi()->destroy($publicId);
        }
    }

    public function uploadProductImages($files, $productName, $folder = '/products'): array
    {
        $cloudFolder = "petsvet/{$folder}";
        $uploadedImages = [];

        // Ensure $files is an array
        if (!\is_array($files)) {
            $files = [$files];
        }

        foreach ($files as $file) {
            // Clean product name to use in filename
            $cleanName = preg_replace('/[^A-Za-z0-9_\-]/', '_', strtolower($productName));
            $timestamp = time();
            $publicId = "product_{$cleanName}_{$timestamp}";

            $result = $this->cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                [
                    'folder' => $cloudFolder,
                    'public_id' => $publicId,
                ]
            );

            $uploadedImages[] = [
                'url' => $result['secure_url'] ?? null,
                'public_id' => $result['public_id'] ?? null,
            ];
        }

        return $uploadedImages;
    }

}

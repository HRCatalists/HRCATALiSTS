<?php
namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Illuminate\Support\Facades\Storage;

class GoogleDriveService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $path = storage_path('app/' . env('GOOGLE_DRIVE_CREDENTIALS'));

        $this->client = new Google_Client();
        $this->client->setAuthConfig($path);
        $this->client->addScope(Google_Service_Drive::DRIVE_FILE);

        $this->service = new Google_Service_Drive($this->client);
    }

    public function uploadFile($file)
    {
        $folderId = env('GOOGLE_DRIVE_FOLDER_ID');
        
        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $file->getClientOriginalName(),
            'parents' => [$folderId],
        ]);

        $content = file_get_contents($file->getPathname());

        $uploadedFile = $this->service->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => $file->getMimeType(),
            'uploadType' => 'multipart',
            'fields' => 'id',
        ]);

        return $uploadedFile->id;
    }
}

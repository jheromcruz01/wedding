<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;

class DriveAPIService
{
    public function getAccessToken()
    {
        $client_id = env('GDRIVE_CLIENT_ID');
        $client_secret = env('GDRIVE_CLIENT_SECRET');
        $refresh_token = env('GDRIVE_REFRESH_TOKEN');

        $response = Http::post('https://oauth2.googleapis.com/token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'refresh_token' => $refresh_token,
            'grant_type' => 'refresh_token',
        ]);

        if ($response->successful()) {
            return $response->json()['access_token'];
        }

        return null;
    }

    public function uploadFileToDrive($filePath, $folderId = null)
    {
        $accessToken = $this->getAccessToken();

        if (!$accessToken) {
            return false;
        }

        if (!file_exists($filePath)) {
            return false;
        }

        $client = new Client();
        $client->setAccessToken($accessToken);
        $driveService = new Drive($client);

        $fileMetadata = new DriveFile([
            'name' => basename($filePath),
        ]);

        $content = file_get_contents($filePath);
        $mimeType = mime_content_type($filePath) ?: 'application/octet-stream';

        try {
            $file = $driveService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $mimeType,
                'uploadType' => 'multipart',
                'fields' => 'id,webViewLink',
            ]);

            return [
                'id' => $file->id,
                'link' => $file->webViewLink,
            ];
        } catch (\Exception $e) {
            \Log::error('DriveAPI Upload error: ' . $e->getMessage());
            return false;
        }
    }

    public function makeFilePublic($fileId)
    {
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            \Log::error('DriveAPI: No access token');
            return false;
        }

        $client = new Client();
        $client->setAccessToken($accessToken);
        $driveService = new Drive($client);

        $permission = new \Google\Service\Drive\Permission([
            'type' => 'anyone',
            'role' => 'reader',
        ]);

        try {
            $result = $driveService->permissions->create($fileId, $permission);
            \Log::info('DriveAPI: File made public - ' . $fileId);
            return true;
        } catch (\Exception $e) {
            \Log::error('DriveAPI: Permission error - ' . $e->getMessage());
            return false;
        }
    }
}
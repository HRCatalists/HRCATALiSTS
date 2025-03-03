<?php

namespace App\Services;

use GuzzleHttp\Client;

class PCloudService
{
    protected $client;
    protected $baseUrl = 'https://api.pcloud.com/';

    public function __construct()
    {
        $this->client = new Client();
    }

    public function authenticate()
    {
        $response = $this->client->post($this->baseUrl . 'userinfo', [
            'form_params' => [
                'username' => env('PCLOUD_USERNAME'),
                'password' => env('PCLOUD_PASSWORD'),
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    public function uploadFile($filePath, $fileName)
    {
        $auth = $this->authenticate();
        $accessToken = $auth['auth'];

        $response = $this->client->post($this->baseUrl . 'uploadfile', [
            'headers' => ['Authorization' => "Bearer $accessToken"],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($filePath, 'r'),
                    'filename' => $fileName
                ],
                [
                    'name' => 'folderid',
                    'contents' => env('PCLOUD_FOLDER_ID', 0)
                ]
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}

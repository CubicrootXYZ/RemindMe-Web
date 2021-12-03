<?php

namespace App\Lib;

use App\Exceptions\ApiException;
use Illuminate\Support\Facades\Log;

class RemindMeApi
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    private $username = '';
    private $password = '';
    private $baseUrl = '';

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->baseUrl = env('REMINDME_URL', '');
    }

    public function UserGet(): array
    {
        $url = $this->baseUrl . '/user';
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    public function ChannelGet(): array
    {
        $url = $this->baseUrl . '/channel';
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    private function sendRequest(int $method, string $url, array $data = []): array
    {
        Log::debug('Making request to: ' . $url);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, $method, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $headers = array(
            "Content-Type: application/json",
            "Authorization: " . $this->password,
        );
        Log::debug('Making request to: ' . json_encode($headers));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }
        $resp = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        Log::debug("Response code was: " . $statusCode . "; Response data is: " . $resp);

        if ($resp === false) {
            throw new ApiException($statusCode, 'Unknown Error');
        }

        $parsedResp = $this->parseResponse($resp);
        if (!key_exists('status', $parsedResp)) {
            throw new ApiException($statusCode, 'Malformed response');
        }


        if ($parsedResp['status'] != 'success') {
            throw new ApiException($statusCode, $parsedResp['message']);
        }

        return $parsedResp;
    }

    private function parseResponse(string $resp): array
    {
        $parsed = json_decode($resp, true);

        if (is_null($parsed)) {
            return [];
        }

        return $parsed;
    }
}

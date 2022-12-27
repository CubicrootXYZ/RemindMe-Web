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

    public function UserGet($include = []): array
    {
        $url = $this->baseUrl . '/user?include[]=' . join(',', $include);
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    public function UserIDPost(string $userID, array $data): array
    {
        $url = $this->baseUrl . '/user/' . $userID;
        $responseData = $this->sendRequest(CURLOPT_PUT, $url, $data);
        return $responseData;
    }

    public function ChannelGet(): array
    {
        $url = $this->baseUrl . '/channel';
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    public function ChannelIDDelete(int $channelID): array
    {
        $url = $this->baseUrl . '/channel/' . $channelID;
        $data = $this->sendRequest(-1, $url);
        return $data;
    }

    public function CalendarGet(): array
    {
        $url = $this->baseUrl . '/calendar';
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    public function CalendarPatch(int $calendarID): array
    {
        $url = $this->baseUrl . '/calendar/' . $calendarID;
        $data = $this->sendRequest(-2, $url);
        return $data;
    }

    public function ThirdPartyResourcesGet(int $channelID): array
    {
        $url = $this->baseUrl . '/channel/' . $channelID . '/thirdpartyresources';
        $data = $this->sendRequest(CURLOPT_HTTPGET, $url);
        return $data;
    }

    public function ThirdPartyResourcesDelete(int $channelID, int $resourceID): array
    {
        $url = $this->baseUrl . '/channel/' . $channelID . '/thirdpartyresources/' . $resourceID;
        $data = $this->sendRequest(-1, $url);
        return $data;
    }

    // @param int $method a CURLOPT method or -1 for DELETE, -2 for PATCH
    private function sendRequest(int $method, string $url, array $data = []): array
    {
        Log::debug('Making request to: ' . $url);

        // Set url and method
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        if ($method == CURLOPT_PUT) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        } else if ($method == -1) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        } else if ($method == -2) {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
        } else {
            curl_setopt($curl, $method, true);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Set headers and data
        $headers = array(
            "Content-Type: application/json",
            "Authorization: " . $this->password,
        );

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            Log::debug('Making request to: ' . json_encode($data));
        }

        // Read response
        $resp = curl_exec($curl);
        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        Log::debug("Response code was: " . $statusCode . "; Response data is: " . $resp);

        // Handle response
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

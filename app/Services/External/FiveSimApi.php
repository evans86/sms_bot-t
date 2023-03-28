<?php

namespace App\Services\External;

use GuzzleHttp\Client;

class FiveSimApi
{
    private string $token;
    const DOMAIN = '5sim.biz';

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getBalance(): array
    {
        $result = $this->requestGet('/v1/user/profile');
        return $result;
    }

    private function requestGet(string $method): array
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://' . self::DOMAIN . $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $this->token;
        $headers[] = 'Accept: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($result, true);
    }

    public function getCountries(): array
    {
        $result = $this->requestGet('/v1/guest/countries');
        return $result;
    }

    public function getProducts(string $country, string $operator): array
    {
        $result = $this->requestGet("/v1/guest/products/$country/$operator");
        return $result;

    }

}

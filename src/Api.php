<?php

namespace FintechSystems\LaravelApiHelpers;

/**
 * An opinioned CURL class the does delete, get, post
 */
class Api
{
    public function get(String $url, array $header = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $header,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function post(String $url, string $postFields, array $header = [])
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => $header,
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function delete(String $url, array $header = [], String $postFields)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_HTTPHEADER => $header,
        ]);

        $response = curl_exec($curl);

        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        ray($statusCode);

        curl_close($curl);

        return $response;
    }

    /**
     * Convert a WhatsApp Number to WHMCS's Phone Number format
     *
     * Convert 14085551234 to +1.408-555-1234
     * Convert 27823096710 to +27.82 309 6710
     *
     */
    public function convertWhatsAppNumberToWhmcsPhoneNumber($phoneNumber)
    {
        if (substr($phoneNumber, 0, 1) == "1") {
            $countryCode = "+" . substr($phoneNumber, 0, 1) . ".";

            $first = substr($phoneNumber, 1, 3) . "-";
            $second = substr($phoneNumber, 4, 3) . "-";
            $last = substr($phoneNumber, 7, 4);
        } else {
            $countryCode = "+" . substr($phoneNumber, 0, 2) . ".";

            $first = substr($phoneNumber, 2, 2) . " ";
            $second = substr($phoneNumber, 4, 3) . " ";
            $last = substr($phoneNumber, 7, 4);
        }

        return $countryCode . $first . $second . $last;
    }
}

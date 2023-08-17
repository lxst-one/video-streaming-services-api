<?php

namespace LxstOne\VSS\src;

use CurlHandle;
use Exception;

abstract class AbstractApi
{
    protected array $defaultGetOptions = [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true
    ];

    protected array $defaultPostOptions = [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true
    ];

    /**
     * @param string $url
     * @return array
     * @throws Exception
     */
    public function get(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $this->defaultGetOptions);
        $response = curl_exec($ch);
        $result = $this->processResponse($ch, $response);
        curl_close($ch);

        return $result;
    }

    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    public function post(string $url, array $data): array
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $this->defaultPostOptions);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        $result = $this->processResponse($ch, $response);
        curl_close($ch);

        return $result;
    }

    /**
     * @param CurlHandle $ch
     * @param string $response
     * @return array
     */
    protected function processResponse(CurlHandle $ch, string $response): array
    {
        $headersSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headersStringSplit = preg_split('/\R/', substr($response, 0, $headersSize));
        $bodyString = substr($response, $headersSize);

        $headersArray = [];
        foreach ($headersStringSplit as $headerString) {
            $headerSplit = explode(': ', $headerString);

            //Skip invalid headers
            if(count($headerSplit) !== 2) {
                continue;
            }

            $headersArray[strtolower(trim($headerSplit[0]))] = trim($headerSplit[1]);
        }

        return [
            'status' => curl_getinfo($ch, CURLINFO_HTTP_CODE) ?? 0,
            'headers' => $headersArray,
            'data' => $bodyString
        ];
    }
}
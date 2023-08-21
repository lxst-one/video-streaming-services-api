<?php

namespace LxstOne\VSS\src\services\vidoza\v1\traits;

trait CustomHeaders
{
    /**
     * @param string $apiKey
     * @return array
     */
    public function customHeaders(string $apiKey): array
    {
        return [
            'Authorization: Bearer ' . $apiKey,
            'Accept: application/json',
            'cache-control: no-cache'
        ];
    }

    /**
     * @return array
     */
    public function getUploadToServerHeaders(): array
    {
        return [
            'cache-control: no-cache'
        ];
    }
}
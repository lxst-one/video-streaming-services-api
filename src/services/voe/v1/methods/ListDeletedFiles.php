<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListDeletedFiles extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' =>    $data['key'],
            'last' =>   $data[0] ?? $data['numberOfLastFiles'] ?? null,
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/files/deleted?' . http_build_query($urlParamsArray)
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
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
            'last' =>   $data[0] ?? $data['lastHours'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/file/deleted?' . http_build_query($urlParamsArray)
        );
    }
}
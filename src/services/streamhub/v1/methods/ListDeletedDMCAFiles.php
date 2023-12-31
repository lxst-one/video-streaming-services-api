<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListDeletedDMCAFiles extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'   => $data['key'],
            'last'  => $data[0] ?? $data['lastHours'] ?? null,
        ];

        return $this->get(
            StreamHub::API_ENDPOINT . '/file/dmca?' . http_build_query($urlParamsArray)
        );
    }
}
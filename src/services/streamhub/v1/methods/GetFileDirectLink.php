<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class GetFileDirectLink extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'       => $data['key'],
            'file_code' => $data[0] ?? $data['fileCode'],
            'q'         => ($data[1] ?? $data['q'] ?? null)?->value,
            'hls'       => $data[2] ?? $data['hls'] ?? null
        ];

        return $this->get(
            Streamhub::API_ENDPOINT . '/file/direct_link?' . http_build_query($urlParamsArray)
        );
    }
}
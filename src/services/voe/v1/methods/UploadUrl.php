<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class UploadUrl extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' => $data['key'],
            'url' => $data[0] ?? $data['url']
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/upload/url?' . http_build_query($urlParamsArray)
        );
    }
}
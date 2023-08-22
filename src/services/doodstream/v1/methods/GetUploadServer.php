<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class GetUploadServer extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' => $data['key']
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/upload/server?' . http_build_query($urlParamsArray)
        );
    }
}
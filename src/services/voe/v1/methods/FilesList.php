<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class FilesList extends AbstractApi implements VideoStreamingServiceMethod
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
            'page' => $data[0] ?? 1,
            'per_page' => $data[1] ?? 20,
            'fld_id' => $data[2] ?? 0,
            'created' => $data[3] ?? null,
            'name' => $data[4] ?? null
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/file/list?' . http_build_query($urlParamsArray)
        );
    }
}
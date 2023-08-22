<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
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
            'key'       => $data['key'],
            'url'       => $data[0] ?? $data['url'],
            'fld_id'    => $data[1] ?? $data['folderId'] ?? null,
            'new_title' => $data[2] ?? $data['title'] ?? null,
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/upload/url?' . http_build_query($urlParamsArray)
        );
    }
}
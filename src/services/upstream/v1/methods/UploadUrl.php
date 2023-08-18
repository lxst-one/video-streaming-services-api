<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
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
            'key' =>            $data['key'],
            'url' =>            $data[0] ?? $data['url'],
            'fld_id' =>         $data[1] ?? $data['folderId'] ?? null,
            'cat_id' =>         $data[2] ?? $data['categoryId'] ?? null,
            'file_public' =>    $data[3] ?? $data['filePublic'] ?? null,
            'file_adult' =>     $data[4] ?? $data['fileAdult'] ?? null,
            'tags' =>           $data[5] ?? $data['tagsString'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/upload/url?' . http_build_query($urlParamsArray)
        );
    }
}
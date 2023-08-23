<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListFiles extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' =>        $data['key'],
            'page' =>       $data[0] ?? $data['pageNumber'] ?? 1,
            'per_page' =>   $data[1] ?? $data['perPage'] ?? 20,
            'fld_id' =>     $data[2] ?? $data['folderId'] ?? 0,
            'created' =>    $data[3] ?? $data['createdAfter'] ?? null,
            'name' =>       $data[4] ?? $data['fileName'] ?? null
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/file/list?' . http_build_query($urlParamsArray)
        );
    }
}
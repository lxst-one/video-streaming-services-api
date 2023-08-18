<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListFolder extends AbstractApi implements VideoStreamingServiceMethod
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
            'fld_id' =>     $data[0] ?? $data['folderId'] ?? null,
            'files' =>      $data[1] ?? $data['showFiles'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/folder/list?' . http_build_query($urlParamsArray)
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
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
            'key'       => $data['key'],
            'page'      => $data[0] ?? $data['page'] ?? null,
            'per_page'  => $data[1] ?? $data['perPage'] ?? null,
            'fld_id'    => $data[2] ?? $data['folderId'] ?? null,
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/file/list?' . http_build_query($urlParamsArray)
        );
    }
}
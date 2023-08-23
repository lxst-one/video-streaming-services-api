<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
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
            'key'      => $data['key'],
            'page'     => $data[0] ?? $data['pageNumber'] ?? null,
            'per_page' => $data[1] ?? $data['perPage'] ?? null,
            'fld_id'   => $data[2] ?? $data['folderId'] ?? null,
            'created'  => $data[3] ?? $data['createdAfter'] ?? null,
            'title'    => $data[4] ?? $data['fileName'] ?? null,
            'public'   => $data[5] ?? $data['filePublic'] ?? null,
            'adult'    => $data[6] ?? $data['fileAdult'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/file/list?' . http_build_query($urlParamsArray)
        );
    }
}
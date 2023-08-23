<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class EditFiles extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $filesCodes = is_array($data[0] ?? $data['filesCodes']) ?
            $data[0] ?? $data['filesCodes'] : [$data[0] ?? $data['filesCodes']];

        $urlParamsArray = [
            'key'           => $data['key'],
            'file_code'     => implode(',', $filesCodes),
            'file_title'    => $data[1] ?? $data['fileCodes'] ?? null,
            'file_descr'    => $data[2] ?? $data['fileDescription'] ?? null,
            'cat_id'        => $data[3] ?? $data['categoryId'] ?? null,
            'file_fld_id'   => $data[4] ?? $data['folderId'] ?? null,
            'file_public'   => $data[5] ?? $data['filePublic'] ?? null,
            'file_adult'    => $data[6] ?? $data['fileAdult'] ?? null,
            'tags'          => $data[7] ?? $data['tagsString'] ?? null,
        ];

        return $this->get(
            Streamhub::API_ENDPOINT . '/file/edit?' . http_build_query($urlParamsArray)
        );
    }
}
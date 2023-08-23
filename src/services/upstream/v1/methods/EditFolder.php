<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class EditFolder extends AbstractApi implements VideoStreamingServiceMethod
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
            'fld_id'    => $data[0] ?? $data['folderId'],
            'name'      => $data[1] ?? $data['folderName'] ?? null,
            'parent_id' => $data[2] ?? $data['parentFolderId'] ?? null,
            'descr'     => $data[3] ?? $data['folderDescription'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/folder/edit?' . http_build_query($urlParamsArray)
        );
    }
}
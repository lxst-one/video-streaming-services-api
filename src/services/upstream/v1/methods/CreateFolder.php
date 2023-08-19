<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class CreateFolder extends AbstractApi implements VideoStreamingServiceMethod
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
            'name' =>       $data[0] ?? $data['folderName'],
            'descr' =>      $data[1] ?? $data['folderDescription'] ?? '',
            'parent_id' =>  $data[2] ?? $data['parentFolderId'] ?? null,
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/folder/create?' . http_build_query($urlParamsArray)
        );
    }
}
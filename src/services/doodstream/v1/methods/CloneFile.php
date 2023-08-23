<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class CloneFile extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'api_key'   => $data['key'],
            'file_code' => $data[0] ?? $data['fileCode'],
            'fld_id'    => $data[1] ?? $data['folderId'] ?? null
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/file/clone?' . http_build_query($urlParamsArray)
        );
    }
}
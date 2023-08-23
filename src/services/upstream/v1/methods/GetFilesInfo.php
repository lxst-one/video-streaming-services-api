<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\upstream\v1\Upstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class GetFilesInfo extends AbstractApi implements VideoStreamingServiceMethod
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
            'file_code' => is_array($data[0] ?? $data['fileCodes']) ?
                implode(',', $data[0] ?? $data['fileCodes']) : $data[0] ?? $data['fileCodes']
        ];

        return $this->get(
            Upstream::API_ENDPOINT . '/file/info?' . http_build_query($urlParamsArray)
        );
    }
}
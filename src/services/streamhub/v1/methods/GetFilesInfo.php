<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
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
        $filesCodes = is_array($data[0] ?? $data['filesCodes']) ?
            $data[0] ?? $data['filesCodes'] : [$data[0] ?? $data['filesCodes']];

        $urlParamsArray = [
            'key'       => $data['key'],
            'file_code' => implode(',', $filesCodes)
        ];

        return $this->get(
            Streamhub::API_ENDPOINT . '/file/info?' . http_build_query($urlParamsArray)
        );
    }
}
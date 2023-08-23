<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class DeleteFiles extends AbstractApi implements VideoStreamingServiceMethod
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
            'del_code' =>   is_array($data[0] ?? $data['deleteCodes']) ?
                implode(',', $data[0] ?? $data['deleteCodes']) : $data[0] ?? $data['deleteCodes'],
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/file/delete?' . http_build_query($urlParamsArray)
        );
    }
}
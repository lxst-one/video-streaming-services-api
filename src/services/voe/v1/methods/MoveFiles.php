<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class MoveFiles extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' => $data['key'],
            'file_code' => is_array($data[0]) ? implode(',', $data[0]) : $data[0],
            'fld_id' => $data[1]
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/file/set_folder?' . http_build_query($urlParamsArray)
        );
    }
}
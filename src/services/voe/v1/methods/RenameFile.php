<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class RenameFile extends AbstractApi implements VideoStreamingServiceMethod
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
            'file_code' =>  $data[0] ?? $data['fileCode'],
            'title' =>      $data[1] ?? $data['newTitle']
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/file/rename?' . http_build_query($urlParamsArray)
        );
    }
}
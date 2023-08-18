<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class RenameFolder extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key' =>    $data['key'],
            'fld_id' => $data[0] ?? $data['folderId'],
            'name' =>   $data[1] ?? $data['folderName']
        ];

        return $this->get(
            Voe::API_ENDPOINT . '/folder/rename?' . http_build_query($urlParamsArray)
        );
    }
}
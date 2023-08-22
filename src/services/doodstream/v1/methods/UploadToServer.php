<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class UploadToServer extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $postParamsArray = [
            'api_key' => $data['key'],
            'file' => curl_file_create($data[1] ?? $data['filePath'])
        ];

        return $this->post(
            $data[0] ?? $data['uploadServerUrl'],
            $postParamsArray
        );
    }
}
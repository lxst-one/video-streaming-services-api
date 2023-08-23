<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;
use LxstOne\VSS\src\shared\exceptions\VideoNotFound;

final class UploadToServer extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception|VideoNotFound
     */
    public function handle(array $data = []): array
    {
        $filePath = $data[1] ?? $data['filePath'];

        if(!file_exists($filePath)) {
            throw new VideoNotFound;
        }

        $postParamsArray = [
            'api_key' => $data['key'],
            'file' => curl_file_create($filePath)
        ];

        return $this->post(
            $data[0] ?? $data['uploadServerUrl'],
            $postParamsArray
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\voe\v1\methods;

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
        if(!file_exists($data[1])) {
            throw new VideoNotFound;
        }

        $curlFile = curl_file_create($data[1]);

        $postParamsArray = [
            'key' => $data['key'],
            'file' => $curlFile,
        ];

        return $this->post(
            $data[0],
            $postParamsArray
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;
use LxstOne\VSS\src\shared\exceptions\VideoNotFound;

final class UploadToServer extends AbstractApi implements VideoStreamingServiceMethod
{
    use CustomHeaders;

    /**
     * @param array $data
     * @return array
     * @throws Exception|VideoNotFound
     */
    public function handle(array $data = []): array
    {
        if(!file_exists($data[2] ?? $data['filePath'])) {
            throw new VideoNotFound;
        }

        $this->defaultPostOptions[CURLOPT_HTTPHEADER] = $this->getUploadToServerHeaders();

        $postParamsArray = [
            'sess_id'       => $data[1] ?? $data['sessionId'],
            'file'          => curl_file_create($data[2] ?? $data['filePath']),
            'file_title'    => $data[3] ?? $data['fileTitle'] ?? null,
            'fld_id'        => $data[4] ?? $data['folderId'] ?? null,
            'cat_id'        => ($data[5] ?? $data['category'] ?? null)?->value,
            'is_xhr'        => true,
        ];

        return $this->post(
            $data[0] ?? $data['uploadServerUrl'],
            $postParamsArray
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;
use LxstOne\VSS\src\shared\exceptions\SnapshotNotFound;
use LxstOne\VSS\src\shared\exceptions\VideoNotFound;

final class UploadToServer extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $snapshotFile = $data[4] ?? $data['snapshotFilePath'] ?? null;
        $filePath = $data[1] ?? $data['filePath'];

        if(!file_exists($data[1] ?? $data['filePath'])) {
            throw new VideoNotFound;
        }

        if($snapshotFile && !file_exists($snapshotFile)) {
            throw new SnapshotNotFound;
        }
        $this->defaultPostOptions[CURLOPT_HEADER] = ['Accept: application/json'];

        $postParamsArray = [
            'api_key'       => $data['key'],
            'file'          => curl_file_create($filePath),
            'file_title'    => $data[2] ?? $data['title'] ?? null,
            'file_descr'    => $data[3] ?? $data['description'] ?? null,
            'snapshot'      => $snapshotFile ? curl_file_create($snapshotFile) : null,
            'fld_id'        => $data[5] ?? $data['folderId'] ?? null,
            'cat_id'        => $data[6] ?? $data['categoryId'] ?? null,
            'tags'          => $data[7] ?? $data['tags'] ?? null,
            'file_public'   => $data[8] ?? $data['filePublic'] ?? null,
            'file_adult'    => $data[9] ?? $data['fileAdult'] ?? null,
            'html_redirect' => $data[10] ?? $data['htmlRedirect'] ?? null,
        ];

        return $this->post(
            $data[0] ?? $data['uploadServerUrl'],
            $postParamsArray
        );
    }
}
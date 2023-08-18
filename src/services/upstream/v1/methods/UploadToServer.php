<?php

namespace LxstOne\VSS\src\services\upstream\v1\methods;

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
     * @throws Exception|VideoNotFound|SnapshotNotFound
     */
    public function handle(array $data = []): array
    {
        if(!file_exists($data[1])) {
            throw new VideoNotFound;
        }

        if(isset($data[4]) && !file_exists($data[4])) {
            throw new SnapshotNotFound;
        }

        $postParamsArray = [
            'key' =>            $data['key'],
            'file' =>           curl_file_create($data[1] ?? $data['filePath']),
            'file_title' =>     $data[2] ?? $data['fileName'] ?? null,
            'file_descr' =>     $data[3] ?? $data['fileDescription'] ?? null,
            'snapshot' =>       isset($data[4]) || isset($data['fileSnapshotPath']) ?
                curl_file_create($data[4] ?? $data['fileSnapshotPath']) : null,
            'fld_id' =>         $data[5] ?? $data['folderId'] ?? null,
            'cat_id' =>         $data[6] ?? $data['categoryId'] ?? null,
            'tags' =>           $data[7] ?? $data['tagsString'] ?? null,
            'file_public' =>    $data[8] ?? $data['filePublic'] ?? null,
            'file_adult' =>     $data[9] ?? $data['fileAdult'] ?? null,
            'html_redirect' =>  $data[10] ?? $data['htmlRedirect'] ?? null,
        ];

        return $this->post(
            $data[0] ?? $data['uploadServerUrl'],
            $postParamsArray
        );
    }
}
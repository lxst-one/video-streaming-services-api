<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1\traits;

use LxstOne\VSS\src\services\upstream\v1\Upstream;

trait UpstreamUpload
{
    /**
     * @param Upstream $upstream
     * @return array
     */
    private function uploadExampleFile(Upstream $upstream): array
    {
        $resultUploadServer = $upstream->getUploadServer();
        $deliveryNodeUrl = json_decode($resultUploadServer['data'], true)['result'];

        return $upstream->uploadToServer($deliveryNodeUrl, $_ENV['EXAMPLE_MP4_FILEPATH']);
    }
}
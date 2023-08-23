<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1\traits;

use LxstOne\VSS\src\services\streamhub\v1\Streamhub;

trait StreamhubUpload
{
    /**
     * @param Streamhub $streamhub
     * @return array
     */
    private function uploadExampleFile(Streamhub $streamhub): array
    {
        $resultUploadServer = $streamhub->getUploadServer();
        $deliveryNodeUrl = json_decode($resultUploadServer['data'], true)['result'];

        return $streamhub->uploadToServer($deliveryNodeUrl, $_ENV['EXAMPLE_MP4_FILEPATH']);
    }
}
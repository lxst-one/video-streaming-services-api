<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1\traits;

use LxstOne\VSS\src\services\doodstream\v1\Doodstream;

trait DoodstreamUpload
{
    /**
     * @param Doodstream $doodstream
     * @return array
     */
    private function uploadExampleFile(Doodstream $doodstream): array
    {
        $resultUploadServer = $doodstream->getUploadServer();
        $deliveryNodeUrl = json_decode($resultUploadServer['data'], true)['result'];

        return $doodstream->uploadToServer($deliveryNodeUrl, $_ENV['EXAMPLE_MP4_FILEPATH']);
    }
}
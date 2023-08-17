<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1\traits;

use LxstOne\VSS\src\services\voe\v1\Voe;

trait VoeUpload
{
    /**
     * @param Voe $voe
     * @return array
     */
    private function uploadExampleFile(Voe $voe): array
    {
        $resultUploadServer = $voe->uploadServer();
        $deliveryNodeUrl = json_decode($resultUploadServer['data'], true)['result'];

        return $voe->uploadToServer($deliveryNodeUrl, $_ENV['EXAMPLE_MP4_FILEPATH']);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1\traits;

use LxstOne\VSS\src\services\vidoza\v1\Vidoza;

trait VidozaUpload
{
    /**
     * @param Vidoza $vidoza
     * @return array
     */
    private function uploadExampleFile(Vidoza $vidoza): array
    {
        $resultUploadServer = $vidoza->getUploadServer();
        $dataArray = json_decode($resultUploadServer['data'], true)['data'];

        $deliveryNodeUrl = $dataArray['upload_url'];
        $sessionId = $dataArray['upload_params']['sess_id'];

        return $vidoza->uploadToServer($deliveryNodeUrl, $sessionId, $_ENV['EXAMPLE_MP4_FILEPATH']);
    }
}
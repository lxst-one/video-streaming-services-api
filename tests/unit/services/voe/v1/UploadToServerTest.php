<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class UploadToServerTest extends TestCase
{
    use VoeInstance, VoeUpload;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $voe = $this->getVoeInstance();

        $resultUploadToServer = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $fileCode = json_decode($resultUploadToServer['data'], true)['file']['file_code'];

        $resultDeleteFile = $voe->deleteFiles($fileCode);
        $this->assertTrue($resultDeleteFile['status'] === 200);
    }
}
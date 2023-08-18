<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class FilesInfoTest extends TestCase
{
    use VoeInstance, VoeUpload;

    /**
     * @throws Exception
     */
    public function testCanGetFilesInfo()
    {
        $voe = $this->getVoeInstance();

        $resultUploadToServer = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $fileCode = json_decode($resultUploadToServer['data'], true)['file']['file_code'];

        $resultFilesInfo = $voe->getFilesInfo($fileCode);
        $this->assertTrue($resultFilesInfo['status'] === 200);

        $resultDeleteFiles = $voe->deleteFiles($fileCode);
        $this->assertTrue($resultDeleteFiles['status'] === 200);
    }
}
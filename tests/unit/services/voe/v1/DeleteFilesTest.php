<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class DeleteFilesTest extends TestCase
{
    use VoeInstance, VoeUpload;

    /**
     * @throws Exception
     */
    public function testCanDeleteFiles()
    {
        $voe = $this->getVoeInstance();

        $resultUploadToServer1 = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadToServer1['status'] === 200);
        $fileCode1 = json_decode($resultUploadToServer1['data'], true)['file']['file_code'];

        $resultUploadToServer2 = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadToServer2['status'] === 200);
        $fileCode2 = json_decode($resultUploadToServer2['data'], true)['file']['file_code'];

        $resultDeleteFile = $voe->deleteFiles([$fileCode1, $fileCode2]);
        $this->assertTrue($resultDeleteFile['status'] === 200);
    }
}
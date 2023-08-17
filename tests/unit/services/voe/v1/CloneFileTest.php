<?php

namespace tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class CloneFileTest extends TestCase
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
        $fileCode1 = json_decode($resultUploadToServer['data'], true)['file']['file_code'];

        $resultCloneFile = $voe->cloneFile($fileCode1);
        $this->assertTrue($resultCloneFile['status'] === 200);
        $fileCode2 = json_decode($resultCloneFile['data'], true)['result']['filecode'];

        $resultDeleteFile = $voe->deleteFiles([$fileCode1, $fileCode2]);
        $this->assertTrue($resultDeleteFile['status'] === 200);
    }
}
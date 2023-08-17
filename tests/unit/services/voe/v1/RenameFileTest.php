<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class RenameFileTest extends TestCase
{
    use VoeInstance, VoeUpload;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $voe = $this->getVoeInstance();

        $resultUploadToServer = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $fileCode = json_decode($resultUploadToServer['data'], true)['file']['file_code'];

        $resultRenameFile = $voe->renameFile($fileCode, 'title-'.time());
        $this->assertTrue($resultRenameFile['status'] === 200);

        $resultDeleteFile = $voe->deleteFiles($fileCode);
        $this->assertTrue($resultDeleteFile['status'] === 200);
    }
}
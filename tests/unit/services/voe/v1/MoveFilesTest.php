<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeUpload;

final class MoveFilesTest extends TestCase
{
    use VoeInstance, VoeUpload;

    /**
     * @throws Exception
     */
    public function testCanMoveFiles()
    {
        $voe = $this->getVoeInstance();

        $resultUploadExampleFile = $this->uploadExampleFile($voe);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['file']['file_code'];

        $resultCreateFolder = $voe->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
        $folderId = json_decode($resultCreateFolder['data'], true)['result']['fld_id'];

        $resultMoveFiles = $voe->moveFiles($fileCode, $folderId);
        $this->assertTrue($resultMoveFiles['status'] === 200);

        $resultDeleteFiles = $voe->deleteFiles($fileCode);
        $this->assertTrue($resultDeleteFiles['status'] === 200);
    }
}
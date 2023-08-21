<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaUpload;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class EditFileTest extends TestCase
{
    use VidozaInstance, VidozaUpload;

    /**
     * @throws Exception
     */
    public function testCanEditFile()
    {
        $vidoza = $this->getVidozaInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($vidoza);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['code'];

        $resultEditFile = $vidoza->editFile($fileCode, 'test-'.time(), 'test-'.time(), 'title-'.time(), 0);
        $this->assertTrue($resultEditFile['status'] === 200);
    }
}
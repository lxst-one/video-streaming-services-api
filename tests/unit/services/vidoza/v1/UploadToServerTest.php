<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaUpload;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class UploadToServerTest extends TestCase
{
    use VidozaInstance, VidozaUpload;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $vidoza = $this->getVidozaInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($vidoza);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
    }
}
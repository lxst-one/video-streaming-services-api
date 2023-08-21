<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaUpload;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class ListFSrtForFileTest extends TestCase
{
    use VidozaInstance, VidozaUpload;

    /**
     * @throws Exception
     */
    public function testCanListSrtForFile()
    {
        $vidoza = $this->getVidozaInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($vidoza);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['code'];

        $resultListSrtForFile = $vidoza->listSrtForFile($fileCode);
        $this->assertTrue($resultListSrtForFile['status'] === 200);
    }
}
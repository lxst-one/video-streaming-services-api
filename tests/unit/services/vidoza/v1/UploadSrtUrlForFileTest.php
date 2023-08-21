<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoLang;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaUpload;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class UploadSrtUrlForFileTest extends TestCase
{
    use VidozaInstance, VidozaUpload;

    /**
     * @throws Exception
     */
    public function testUploadSrtForFile()
    {
        $vidoza = $this->getVidozaInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($vidoza);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['code'];

        $resultUploadSrtUrlForFile = $vidoza->uploadSrtUrlForFile($fileCode, VideoLang::ENGLISH, $_ENV['EXAMPLE_SRT_URL']);
        $this->assertTrue($resultUploadSrtUrlForFile['status'] === 200);
    }
}
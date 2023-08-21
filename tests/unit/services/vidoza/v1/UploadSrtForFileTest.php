<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoLang;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoLangExtension;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaUpload;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class UploadSrtForFileTest extends TestCase
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

        $resultUploadSrtForFile = $vidoza->uploadSrtForFile($fileCode, VideoLang::ENGLISH, 'example.srt');
        $this->assertTrue($resultUploadSrtForFile['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class GetFileImageTest extends TestCase
{
    use DoodstreamInstance, DoodstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanGetFileImage()
    {
        $doodstream = $this->getDoodstreamInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($doodstream);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['result']['filecode'];

        $resultGetFileImage = $doodstream->getFileImage($fileCode);
        $this->assertTrue($resultGetFileImage['status'] === 200);
    }
}
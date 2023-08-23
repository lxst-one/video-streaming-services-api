<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetUrlUploadStatusTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUrlUploadStatus()
    {
        $doodstream = $this->getDoodstreamInstance();
        $resultUrlUpload = $doodstream->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $fileCode = json_decode($resultUrlUpload['data'], true);

        $resultUrlUploadStatus = $doodstream->getUrlUploadStatus($fileCode);
        $this->assertTrue($resultUrlUploadStatus['status'] === 200);
    }
}
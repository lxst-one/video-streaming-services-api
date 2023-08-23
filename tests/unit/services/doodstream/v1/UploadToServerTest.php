<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class UploadToServerTest extends TestCase
{
    use DoodstreamInstance, DoodstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $doodstream = $this->getDoodstreamInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($doodstream);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
    }
}
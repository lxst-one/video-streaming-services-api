<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamUpload;
use PHPUnit\Framework\TestCase;

final class UploadToServerTest extends TestCase
{
    use UpstreamInstance, UpstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $upstream = $this->getUpstreamInstance();

        $resultUploadToServer = $this->uploadExampleFile($upstream);
        $this->assertTrue($resultUploadToServer['status'] === 200);
    }
}
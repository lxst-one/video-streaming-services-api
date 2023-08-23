<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class UploadUrlTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $upstream = $this->getUpstreamInstance();

        $resultUploadUrl = $upstream->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $this->assertTrue($resultUploadUrl['status'] === 200);
    }
}
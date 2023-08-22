<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class UploadUrlTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $voe = $this->getUpstreamInstance();

        $resultUploadUrl = $voe->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $this->assertTrue($resultUploadUrl['status'] === 200);
    }
}
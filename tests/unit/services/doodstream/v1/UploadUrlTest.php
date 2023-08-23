<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class UploadUrlTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $this->assertTrue($result['status'] === 200);
    }
}
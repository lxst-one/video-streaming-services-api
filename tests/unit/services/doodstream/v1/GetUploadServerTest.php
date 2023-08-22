<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetUploadServerTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUploadServer()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->getUploadServer();
        $this->assertTrue($result['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetUploadServerTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUploadServer()
    {
        $upstream = $this->getUpstreamInstance();
        $result = $upstream->getUploadServer();

        $this->assertTrue($result['status'] === 200);
    }
}
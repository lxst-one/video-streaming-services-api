<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetEncodingQueueTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetEncodingQueue()
    {
        $upstream = $this->getUpstreamInstance();
        $result = $upstream->getEncodingQueue();

        $this->assertTrue($result['status'] === 200);
    }
}
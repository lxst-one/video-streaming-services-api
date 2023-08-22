<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetEncodingQueueTest extends TestCase
{
    use DoodstreamInstance;

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
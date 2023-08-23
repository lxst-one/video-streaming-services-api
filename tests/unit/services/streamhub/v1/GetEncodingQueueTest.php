<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class GetEncodingQueueTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetEncodingQueue()
    {
        $streamhub = $this->getStreamhubInstance();
        $result = $streamhub->getEncodingQueue();

        $this->assertTrue($result['status'] === 200);
    }
}
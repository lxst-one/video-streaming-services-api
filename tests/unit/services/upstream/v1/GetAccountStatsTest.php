<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountStatsTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountStats()
    {
        $upstream = $this->getUpstreamInstance();
        $result = $upstream->getAccountStats();

        $this->assertTrue($result['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountStatsTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountStats()
    {
        $voe = $this->getUpstreamInstance();
        $result = $voe->getAccountStats();

        $this->assertTrue($result['status'] === 200);
    }
}
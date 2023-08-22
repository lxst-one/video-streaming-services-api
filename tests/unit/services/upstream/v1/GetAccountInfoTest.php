<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountInfoTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $voe = $this->getUpstreamInstance();
        $result = $voe->getAccountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
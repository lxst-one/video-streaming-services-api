<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountInfoTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $upstream = $this->getUpstreamInstance();
        $result = $upstream->getAccountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
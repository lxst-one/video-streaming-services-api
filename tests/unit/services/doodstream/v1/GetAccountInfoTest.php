<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountInfoTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->getAccountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
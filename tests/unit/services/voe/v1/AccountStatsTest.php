<?php

namespace tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class AccountStatsTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountStats()
    {
        $voe = $this->getVoeInstance();
        $result = $voe->accountStats();

        $this->assertTrue($result['status'] === 200);
    }
}
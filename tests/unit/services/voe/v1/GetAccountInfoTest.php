<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class GetAccountInfoTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $voe = $this->getVoeInstance();
        $result = $voe->getAccountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
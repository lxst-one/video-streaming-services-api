<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class AccountInfoTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $voe = $this->getVoeInstance();
        $result = $voe->accountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
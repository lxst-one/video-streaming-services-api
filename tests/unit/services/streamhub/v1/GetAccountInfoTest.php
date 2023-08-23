<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountInfoTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $streamhub = $this->getStreamhubInstance();
        $result = $streamhub->getAccountInfo();

        $this->assertTrue($result['status'] === 200);
    }
}
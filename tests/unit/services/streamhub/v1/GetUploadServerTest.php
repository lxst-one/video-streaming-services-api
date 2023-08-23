<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class GetUploadServerTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUploadServer()
    {
        $streamhub = $this->getStreamhubInstance();
        $result = $streamhub->getUploadServer();

        $this->assertTrue($result['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class UploadServerTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUploadServer()
    {
        $voe = $this->getVoeInstance();
        $result = $voe->uploadServer();

        $this->assertTrue($result['status'] === 200);
    }
}
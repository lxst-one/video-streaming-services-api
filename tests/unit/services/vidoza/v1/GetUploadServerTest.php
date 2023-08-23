<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class GetUploadServerTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUploadServer()
    {
        $vidoza = $this->getVidozaInstance();
        $result = $vidoza->getUploadServer();

        $this->assertTrue($result['status'] === 200);
    }
}
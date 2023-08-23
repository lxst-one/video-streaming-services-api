<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class UploadUrlTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultUploadUrl = $streamhub->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $this->assertTrue($resultUploadUrl['status'] === 200);
    }
}
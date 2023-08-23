<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class UploadUrlTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $voe = $this->getVoeInstance();

        $resultUploadUrl = $voe->uploadUrl($_ENV['EXAMPLE_MP4_URL']);
        $this->assertTrue($resultUploadUrl['status'] === 200);

        // Video has to be processed from queue so after that it has to be deleted manually
    }
}
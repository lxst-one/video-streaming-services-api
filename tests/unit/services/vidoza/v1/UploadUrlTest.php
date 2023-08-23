<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoCategory;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class UploadUrlTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadUrl()
    {
        $vidoza = $this->getVidozaInstance();
        $resultUploadUrl = $vidoza->uploadUrl($_ENV['EXAMPLE_MP4_URL'], 0, VideoCategory::EVERYONE);
        $this->assertTrue($resultUploadUrl['status'] === 201);
    }
}
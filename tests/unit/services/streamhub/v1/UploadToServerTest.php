<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubUpload;
use PHPUnit\Framework\TestCase;

final class UploadToServerTest extends TestCase
{
    use StreamhubInstance, StreamhubUpload;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultUploadToServer = $this->uploadExampleFile($streamhub);
        $this->assertTrue($resultUploadToServer['status'] === 200);
    }
}
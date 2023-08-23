<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamUpload;
use PHPUnit\Framework\TestCase;

final class CloneFileTest extends TestCase
{
    use UpstreamInstance, UpstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanCloneFile()
    {
        $upstream = $this->getUpstreamInstance();

        $resultUploadToServer = $this->uploadExampleFile($upstream);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $fileCode = json_decode($resultUploadToServer['data'], true)['files'][0]['filecode'];

        $resultCloneFile = $upstream->cloneFile($fileCode);
        $this->assertTrue($resultCloneFile['status'] === 200);
    }
}
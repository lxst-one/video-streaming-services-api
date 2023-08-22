<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class CloneFileTest extends TestCase
{
    use DoodstreamInstance, DoodstreamUpload;

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
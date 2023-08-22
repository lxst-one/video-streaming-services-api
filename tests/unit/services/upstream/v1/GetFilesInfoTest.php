<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class GetFilesInfoTest extends TestCase
{
    use DoodstreamInstance, DoodstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanGetFilesInfo()
    {
        $upstream = $this->getUpstreamInstance();

        $resultUploadToServer = $this->uploadExampleFile($upstream);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $filesCodes = array_column(json_decode($resultUploadToServer['data'], true)['files'], 'filecode');

        $resultFilesInfo = $upstream->getFilesInfo($filesCodes);
        $this->assertTrue($resultFilesInfo['status'] === 200);
    }
}
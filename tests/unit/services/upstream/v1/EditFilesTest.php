<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamUpload;
use PHPUnit\Framework\TestCase;

final class EditFilesTest extends TestCase
{
    use UpstreamInstance, UpstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanEditFiles()
    {
        $upstream = $this->getUpstreamInstance();

        $resultUploadToServer = $this->uploadExampleFile($upstream);
        $this->assertTrue($resultUploadToServer['status'] === 200);
        $filesCodes = array_column(json_decode($resultUploadToServer['data'], true)['files'], 'filecode');

        $resultEditFiles = $upstream->editFiles($filesCodes, fileTitle: 'test-'.time());
        $this->assertTrue($resultEditFiles['status'] === 200);
    }
}
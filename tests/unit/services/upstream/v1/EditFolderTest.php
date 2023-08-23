<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class EditFolderTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanEditFolder()
    {
        $upstream = $this->getUpstreamInstance();

        $resultCreateFolder = $upstream->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
        $folderId = json_decode($resultCreateFolder['data'], true)['result']['fld_id'];

        $resultEditFolder = $upstream->editFolder($folderId, 'time-'.time());
        $this->assertTrue($resultEditFolder['status'] === 200);
    }
}
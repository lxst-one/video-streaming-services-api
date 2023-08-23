<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class EditFolderTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanEditFolder()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultCreateFolder = $streamhub->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
        $folderId = json_decode($resultCreateFolder['data'], true)['result']['fld_id'];

        $resultEditFolder = $streamhub->editFolder($folderId, 'time-'.time());
        $this->assertTrue($resultEditFolder['status'] === 200);
    }
}
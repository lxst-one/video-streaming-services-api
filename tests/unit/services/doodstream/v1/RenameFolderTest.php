<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class RenameFolderTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanRenameFolder()
    {
        $doodstream = $this->getDoodstreamInstance();
        $resultCreateFolder = $doodstream->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
        $folderId = json_decode($resultCreateFolder['data'], true)['result']['fld_id'];

        $resultRenameFolder = $doodstream->renameFile($folderId, 'test-'.time());
        $this->assertTrue($resultRenameFolder['status'] === 200);
    }
}
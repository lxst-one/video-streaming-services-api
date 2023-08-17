<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class RenameFolderTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountInfo()
    {
        $voe = $this->getVoeInstance();

        $resultCreateFolder = $voe->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
        $folderId = json_decode($resultCreateFolder['data'], true)['result']['fld_id'];

        $resultRenameFolder = $voe->renameFolder($folderId, 'test-'.time());
        $this->assertTrue($resultRenameFolder['status'] === 200);
    }
}
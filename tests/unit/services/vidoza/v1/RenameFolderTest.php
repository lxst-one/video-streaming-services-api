<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class RenameFolderTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanRenameFolder()
    {
        $vidoza = $this->getVidozaInstance();
        $resultCreateFolder = $vidoza->createFolder('test-'.time());
        $folderId = json_decode($resultCreateFolder['data'], true)['data']['id'];

        $resultRenameFolder = $vidoza->renameFolder($folderId, 'test-'.time());
        $this->assertTrue($resultRenameFolder['status'] === 200);
    }
}
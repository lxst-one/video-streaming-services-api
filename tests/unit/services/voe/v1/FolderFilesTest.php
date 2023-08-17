<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class FolderFilesTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $voe = $this->getVoeInstance();

        $resultFolderFiles = $voe->folderFiles(0);
        $this->assertTrue($resultFolderFiles['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class GetFolderFilesTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetFolderFiles()
    {
        $voe = $this->getVoeInstance();

        $resultFolderFiles = $voe->getFolderFiles(0);
        $this->assertTrue($resultFolderFiles['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class FilesListTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetFilesList()
    {
        $voe = $this->getVoeInstance();

        $resultFilesInfo = $voe->filesList();
        $this->assertTrue($resultFilesInfo['status'] === 200);
    }
}
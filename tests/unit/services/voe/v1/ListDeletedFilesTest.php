<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class ListDeletedFilesTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedFiles()
    {
        $voe = $this->getVoeInstance();

        $resultDeletedFilesList = $voe->listDeletedFiles(10);
        $this->assertTrue($resultDeletedFilesList['status'] === 200);
    }
}
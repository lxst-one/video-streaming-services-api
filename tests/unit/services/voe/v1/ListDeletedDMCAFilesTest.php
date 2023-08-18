<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class ListDeletedDMCAFilesTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedDMCAFiles()
    {
        $voe = $this->getVoeInstance();

        $resultDeletedDMCAFilesList = $voe->listDeletedDMCAFiles(10);
        $this->assertTrue($resultDeletedDMCAFilesList['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class ListFilesTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfFiles()
    {
        $voe = $this->getVoeInstance();

        $resultFilesInfo = $voe->listFiles();
        $this->assertTrue($resultFilesInfo['status'] === 200);
    }
}
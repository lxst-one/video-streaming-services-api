<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class DeletedFilesListTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetDeletedFilesList()
    {
        $voe = $this->getVoeInstance();

        $resultDeletedFilesList = $voe->deletedFilesList(10);
        $this->assertTrue($resultDeletedFilesList['status'] === 200);
    }
}
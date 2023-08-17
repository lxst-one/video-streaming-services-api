<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class DeletedDMCAFilesListTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanGetDeletedDMCAFilesList()
    {
        $voe = $this->getVoeInstance();

        $resultDeletedDMCAFilesList = $voe->deletedDMCAFilesList(10);
        $this->assertTrue($resultDeletedDMCAFilesList['status'] === 200);
    }
}
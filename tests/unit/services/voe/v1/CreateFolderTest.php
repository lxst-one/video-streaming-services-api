<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\voe\v1\traits\VoeInstance;

final class CreateFolderTest extends TestCase
{
    use VoeInstance;

    /**
     * @throws Exception
     */
    public function testCanUploadToServer()
    {
        $voe = $this->getVoeInstance();

        $resultCreateFolder = $voe->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
    }
}
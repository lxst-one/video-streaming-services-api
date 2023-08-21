<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class ListFoldersTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanListFolders()
    {
        $vidoza = $this->getVidozaInstance();
        $resultListFolders = $vidoza->listFolders();
        $this->assertTrue($resultListFolders['status'] === 200);
    }
}
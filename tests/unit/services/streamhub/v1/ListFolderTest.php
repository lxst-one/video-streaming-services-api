<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class ListFolderTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanListFolder()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultListFolder = $streamhub->listFolder();
        $this->assertTrue($resultListFolder['status'] === 200);
    }
}
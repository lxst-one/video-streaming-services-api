<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListFolderTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanListFolder()
    {
        $upstream = $this->getUpstreamInstance();

        $resultListFolder = $upstream->listFolder();
        $this->assertTrue($resultListFolder['status'] === 200);
    }
}
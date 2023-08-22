<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListFilesTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfFiles()
    {
        $upstream = $this->getUpstreamInstance();

        $resultListFiles = $upstream->listFiles();
        $this->assertTrue($resultListFiles['status'] === 200);
    }
}
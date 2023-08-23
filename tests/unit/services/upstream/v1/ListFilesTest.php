<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListFilesTest extends TestCase
{
    use UpstreamInstance;

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
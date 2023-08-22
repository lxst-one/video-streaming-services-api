<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedFilesTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedFiles()
    {
        $upstream = $this->getUpstreamInstance();

        $result = $upstream->listDeletedFiles();
        $this->assertTrue($result['status'] === 200);
    }
}
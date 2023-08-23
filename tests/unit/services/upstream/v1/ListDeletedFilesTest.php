<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedFilesTest extends TestCase
{
    use UpstreamInstance;

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
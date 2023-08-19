<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\UpstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedDMCAFilesTest extends TestCase
{
    use UpstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedDMCAFiles()
    {
        $upstream = $this->getUpstreamInstance();

        $result = $upstream->listDeletedDMCAFiles();
        $this->assertTrue($result['status'] === 200);
    }
}
<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedDMCAFilesTest extends TestCase
{
    use DoodstreamInstance;

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
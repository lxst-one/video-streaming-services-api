<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\upstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class CreateFolderTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanCreateFolder()
    {
        $upstream = $this->getUpstreamInstance();

        $resultCreateFolder = $upstream->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
    }
}
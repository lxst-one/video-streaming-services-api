<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListFilesTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanListFiles()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->listFiles();
        $this->assertTrue($result['status'] === 200);
    }
}
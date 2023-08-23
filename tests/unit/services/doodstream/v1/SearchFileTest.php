<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class SearchFileTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanSearchFile()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->searchFile('example');
        $this->assertTrue($result['status'] === 200);
    }
}
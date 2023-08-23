<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListDMCAReportsTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanListDMCAReports()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->listDMCAReports();
        $this->assertTrue($result['status'] === 200);
    }
}
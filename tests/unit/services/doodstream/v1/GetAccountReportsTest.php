<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetAccountReportsTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetAccountReports()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->getAccountReports();

        $this->assertTrue($result['status'] === 200);
    }
}
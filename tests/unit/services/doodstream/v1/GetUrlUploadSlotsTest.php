<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class GetUrlUploadSlotsTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanGetUrlUploadSlots()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->getUrlUploadSlots();
        $this->assertTrue($result['status'] === 200);
    }
}
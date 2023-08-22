<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class ListUrlUploadQueueTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanListUrlUploadQueue()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->listUrlUploadQueue();
        $this->assertTrue($result['status'] === 200);
    }
}
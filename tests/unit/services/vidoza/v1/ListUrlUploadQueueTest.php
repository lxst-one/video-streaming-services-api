<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class ListUrlUploadQueueTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanListUrlUploadQueue()
    {
        $vidoza = $this->getVidozaInstance();
        $result = $vidoza->listUrlUploadQueue();
        $this->assertTrue($result['status'] === 200);
    }
}
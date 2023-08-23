<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedFilesTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedFiles()
    {
        $streamhub = $this->getStreamhubInstance();

        $result = $streamhub->listDeletedFiles();
        $this->assertTrue($result['status'] === 200);
    }
}
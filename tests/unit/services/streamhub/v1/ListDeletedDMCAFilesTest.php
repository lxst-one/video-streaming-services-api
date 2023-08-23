<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class ListDeletedDMCAFilesTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfDeletedDMCAFiles()
    {
        $upstream = $this->getStreamhubInstance();

        $result = $upstream->listDeletedDMCAFiles();
        $this->assertTrue($result['status'] === 200);
    }
}
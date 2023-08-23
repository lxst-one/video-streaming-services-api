<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class ListFilesTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanGetListOfFiles()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultListFiles = $streamhub->listFiles();
        $this->assertTrue($resultListFiles['status'] === 200);
    }
}
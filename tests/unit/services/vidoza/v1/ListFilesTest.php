<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class ListFilesTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanListSrtForFile()
    {
        $vidoza = $this->getVidozaInstance();
        $resultListFiles = $vidoza->listFiles();
        $this->assertTrue($resultListFiles['status'] === 200);
    }
}
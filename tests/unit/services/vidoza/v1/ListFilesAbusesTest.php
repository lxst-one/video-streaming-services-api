<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1;

use Exception;
use PHPUnit\Framework\TestCase;
use LxstOne\VSS\tests\unit\services\vidoza\v1\traits\VidozaInstance;

final class ListFilesAbusesTest extends TestCase
{
    use VidozaInstance;

    /**
     * @throws Exception
     */
    public function testCanListFilesAbuses()
    {
        $vidoza = $this->getVidozaInstance();
        $resultListFilesAbuses = $vidoza->listFileAbuses();
        $this->assertTrue($resultListFilesAbuses['status'] === 200);
    }
}
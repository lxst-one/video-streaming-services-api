<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use PHPUnit\Framework\TestCase;

final class CreateFolderTest extends TestCase
{
    use StreamhubInstance;

    /**
     * @throws Exception
     */
    public function testCanCreateFolder()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultCreateFolder = $streamhub->createFolder('test-'.time());
        $this->assertTrue($resultCreateFolder['status'] === 200);
    }
}
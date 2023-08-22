<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class CreateFolderTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanCreateFolder()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->createFolder('test-'.time());
        $this->assertTrue($result['status'] === 200);
    }
}
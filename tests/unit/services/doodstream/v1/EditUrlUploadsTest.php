<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use PHPUnit\Framework\TestCase;

final class EditUrlUploadsTest extends TestCase
{
    use DoodstreamInstance;

    /**
     * @throws Exception
     */
    public function testCanEditUrlUpload()
    {
        $doodstream = $this->getDoodstreamInstance();
        $result = $doodstream->editUrlUploads(true);
        $this->assertTrue($result['status'] === 200);
    }
}
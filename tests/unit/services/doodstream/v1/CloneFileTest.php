<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamInstance;
use LxstOne\VSS\tests\unit\services\doodstream\v1\traits\DoodstreamUpload;
use PHPUnit\Framework\TestCase;

final class CloneFileTest extends TestCase
{
    use DoodstreamInstance, DoodstreamUpload;

    /**
     * @throws Exception
     */
    public function testCanCloneFile()
    {
        $doodstream = $this->getDoodstreamInstance();
        $resultUploadExampleFile = $this->uploadExampleFile($doodstream);
        $this->assertTrue($resultUploadExampleFile['status'] === 200);
        $fileCode = json_decode($resultUploadExampleFile['data'], true)['result'][0]['filecode'];

        $resultCloneFile = $doodstream->cloneFile($fileCode);
        $this->assertTrue($resultCloneFile['status'] === 200);
    }
}
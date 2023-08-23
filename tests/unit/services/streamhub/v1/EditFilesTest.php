<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1;

use Exception;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubInstance;
use LxstOne\VSS\tests\unit\services\streamhub\v1\traits\StreamhubUpload;
use PHPUnit\Framework\TestCase;

final class EditFilesTest extends TestCase
{
    use StreamhubInstance, StreamhubUpload;

    /**
     * @throws Exception
     */
    public function testCanEditFiles()
    {
        $streamhub = $this->getStreamhubInstance();

        $resultUploadToServer = $this->uploadExampleFile($streamhub);
        $this->assertTrue($resultUploadToServer['status'] === 200);

        $resultListFiles = $streamhub->listFiles();
        $firstFileCode = json_decode($resultListFiles['data'], true)['result']['files'][0]['file_code'];

        $resultEditFiles = $streamhub->editFiles($firstFileCode, fileTitle: 'test-'.time());
        $this->assertTrue($resultEditFiles['status'] === 200);
    }
}
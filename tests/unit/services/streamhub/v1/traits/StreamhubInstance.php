<?php

namespace LxstOne\VSS\tests\unit\services\streamhub\v1\traits;

use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
use LxstOne\VSS\src\VideoStreamingService;

trait StreamhubInstance
{
    /**
     * @return Streamhub
     */
    private function getStreamhubInstance(): Streamhub
    {
        return VideoStreamingService::streamhub($_ENV['STREAMHUB_API_V1_KEY'], 'v1');
    }
}
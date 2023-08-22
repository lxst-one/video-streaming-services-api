<?php

namespace LxstOne\VSS\tests\unit\services\doodstream\v1\traits;

use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\VideoStreamingService;

trait DoodstreamInstance
{
    /**
     * @return Doodstream
     */
    private function getDoodstreamInstance(): Doodstream
    {
        return VideoStreamingService::doodstream($_ENV['DOODSTREAM_API_V1_KEY'], 'v1');
    }
}
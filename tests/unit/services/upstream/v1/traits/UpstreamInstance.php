<?php

namespace LxstOne\VSS\tests\unit\services\upstream\v1\traits;

use LxstOne\VSS\src\services\upstream\v1\Upstream;
use LxstOne\VSS\src\VideoStreamingService;

trait UpstreamInstance
{
    /**
     * @return Upstream
     */
    private function getUpstreamInstance(): Upstream
    {
        return VideoStreamingService::upstream($_ENV['UPSTREAM_API_V1_KEY'], 'v1');
    }
}
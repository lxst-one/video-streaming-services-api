<?php

namespace LxstOne\VSS\tests\unit\services\vidoza\v1\traits;

use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\VideoStreamingService;

trait VidozaInstance
{
    /**
     * @return Vidoza
     */
    private function getVidozaInstance(): Vidoza
    {
        return VideoStreamingService::vidoza($_ENV['VIDOZA_API_V1_KEY'], 'v1');
    }
}
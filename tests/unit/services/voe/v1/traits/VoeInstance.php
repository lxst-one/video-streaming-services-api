<?php

namespace LxstOne\VSS\tests\unit\services\voe\v1\traits;

use LxstOne\VSS\src\services\voe\v1\Voe;
use LxstOne\VSS\src\VideoStreamingService;

trait VoeInstance
{
    /**
     * @return Voe
     */
    private function getVoeInstance(): Voe
    {
        return VideoStreamingService::voe($_ENV['VOE_API_V1_KEY'], 'v1');
    }
}
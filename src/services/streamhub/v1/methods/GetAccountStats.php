<?php

namespace LxstOne\VSS\src\services\streamhub\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\streamhub\v1\Streamhub;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class GetAccountStats extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'   => $data['key'],
            'last'  => $data[0] ?? $data['lastDays'] ?? 7
        ];

        return $this->get(
            Streamhub::API_ENDPOINT . '/account/stats?' . http_build_query($urlParamsArray)
        );
    }
}
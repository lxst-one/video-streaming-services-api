<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class GetAccountReports extends AbstractApi implements VideoStreamingServiceMethod
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
            'last'  => $data[0] ?? $data['lastDays'] ?? 7,
            'from_date'  => $data[0] ?? $data['fromDate'] ?? null,
            'to_date'  => $data[0] ?? $data['toDate'] ?? null,
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/account/stats?' . http_build_query($urlParamsArray)
        );
    }
}
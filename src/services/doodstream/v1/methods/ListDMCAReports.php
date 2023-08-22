<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListDMCAReports extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'       => $data['key'],
            'per_page'  => $data[0] ?? $data['perPage'] ?? null,
            'page'      => $data[1] ?? $data['page'] ?? null,
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/dmca/list?' . http_build_query($urlParamsArray)
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class CreateFolder extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'           => $data['key'],
            'name'          => $data[0] ?? $data['name'],
            'parent_id'     => $data[1] ?? $data['parentId'] ?? null,
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/folder/create?' . http_build_query($urlParamsArray)
        );
    }
}
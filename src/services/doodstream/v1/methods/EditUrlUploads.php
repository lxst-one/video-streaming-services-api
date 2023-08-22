<?php

namespace LxstOne\VSS\src\services\doodstream\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\doodstream\v1\Doodstream;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class EditUrlUploads extends AbstractApi implements VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $urlParamsArray = [
            'key'               => $data['key'],
            'restart_errors'    => $data[0] ?? $data['restartErrors'] ?? null,
            'clear_errors'      => $data[1] ?? $data['clearErrors'] ?? null,
            'clear_all'         => $data[2] ?? $data['clearAll'] ?? null,
            'delete_code'       => $data[3] ?? $data['deleteUrlCode'] ?? null
        ];

        return $this->get(
            Doodstream::API_ENDPOINT . '/urlupload/actions?' . http_build_query($urlParamsArray)
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class CreateFolder extends AbstractApi implements VideoStreamingServiceMethod
{
    use CustomHeaders;

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $this->defaultPostOptions[CURLOPT_HTTPHEADER] = $this->customHeaders($data['key']);

        $urlParamsArray = [
            'api_token' => $data['key'],
            'name'      => $data[0] ?? $data['folderName'],
            'parent_id' => $data[1] ?? $data['folderParentId'] ?? null
        ];

        return $this->post(
            Vidoza::API_ENDPOINT . '/folders?' . http_build_query($urlParamsArray)
        );
    }
}
<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListUrlUploadQueue extends AbstractApi implements VideoStreamingServiceMethod
{
    use CustomHeaders;

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $this->defaultGetOptions[CURLOPT_HTTPHEADER] = $this->customHeaders($data['key']);

        $urlParamsArray = [
            'api_token' => $data['key']
        ];

        return $this->get(
            Vidoza::API_ENDPOINT . '/upload/url' . '?' . http_build_query($urlParamsArray)
        );
    }
}
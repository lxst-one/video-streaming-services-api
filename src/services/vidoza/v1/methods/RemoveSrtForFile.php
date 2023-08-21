<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class RemoveSrtForFile extends AbstractApi implements VideoStreamingServiceMethod
{
    use CustomHeaders;

    /**
     * @param array $data
     * @return array
     * @throws Exception
     */
    public function handle(array $data = []): array
    {
        $this->defaultDeleteOptions[CURLOPT_HTTPHEADER] = $this->customHeaders($data['key']);

        $deleteParamsArray = [
            'api_token' => $data['key'],
            'del_srt'   => ($data[1] ?? $data['lang'])->value,
            'ext'       => ($data[2] ?? $data['extension'])->value,
        ];

        return $this->delete(
            Vidoza::API_ENDPOINT . '/files/' . ($data[0] ?? $data['fileCode']) . '/sub?' . http_build_query($deleteParamsArray)
        );
    }
}
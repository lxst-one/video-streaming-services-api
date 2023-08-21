<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class UploadSrtForFile extends AbstractApi implements VideoStreamingServiceMethod
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

        $postParamsArray = [
            'api_token' => $data['key'],
            'srt_lang'  => ($data[1] ?? $data['lang'])->value,
            'srt'       => curl_file_create($data[2] ?? $data['srtPath']),
        ];

        return $this->post(
            Vidoza::API_ENDPOINT . '/files/' . ($data[0] ?? $data['fileCode']) . '/sub',
            $postParamsArray
        );
    }
}
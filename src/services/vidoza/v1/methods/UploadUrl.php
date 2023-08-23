<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class UploadUrl extends AbstractApi implements VideoStreamingServiceMethod
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
            'url'       => $data[0] ?? $data['url'],
            'fld_id'    => $data[1] ?? $data['folderId'],
            'cat_id'    => ($data[2] ?? $data['category'])->value,
        ];

        return $this->post(
            Vidoza::API_ENDPOINT . '/upload/url',
            $postParamsArray
        );
    }
}
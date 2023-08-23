<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class EditFile extends AbstractApi implements VideoStreamingServiceMethod
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
            'name'      => $data[1] ?? $data['fileName'],
            'name_seo'  => $data[2] ?? $data['fileNameSEO'],
            'title'     => $data[3] ?? $data['title'],
            'folder_id' => $data[4] ?? $data['folderId']
        ];

        return $this->post(
            Vidoza::API_ENDPOINT . '/files/' . ($data[0] ?? $data['fileCode']),
            $postParamsArray
        );
    }
}
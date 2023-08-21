<?php

namespace LxstOne\VSS\src\services\vidoza\v1\methods;

use Exception;
use LxstOne\VSS\src\AbstractApi;
use LxstOne\VSS\src\services\vidoza\v1\traits\CustomHeaders;
use LxstOne\VSS\src\services\vidoza\v1\Vidoza;
use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

final class ListFiles extends AbstractApi implements VideoStreamingServiceMethod
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
            'api_token'         => $data['key'],
            'name'              => $data[0] ?? $data['fileName'] ?? null,
            'name_seo'          => $data[1] ?? $data['fileNameSEO'] ?? null,
            'title'             => $data[2] ?? $data['title'] ?? null,
            'folder_id'         => $data[3] ?? $data['folderId'] ?? null,
            'category'          => ($data[4] ?? $data['category'] ?? null)?->value,
            'downloads_from'    => $data[5] ?? $data['downloadsFrom'] ?? null,
            'views_paid_from'   => $data[6] ?? $data['viewsPaidFrom'] ?? null,
            'downloads_to'      => $data[7] ?? $data['downloadsTo'] ?? null,
            'views_paid_to'     => $data[8] ?? $data['viewsPaidTo'] ?? null,
            'orderColumn'       => ($data[9] ?? $data['sortColumn'] ?? null)?->value,
            'orderDirection'    => ($data[10] ?? $data['sortDirection'] ?? null)?->value,
        ];

        return $this->get(
            Vidoza::API_ENDPOINT . '/files?' . http_build_query($urlParamsArray)
        );
    }
}
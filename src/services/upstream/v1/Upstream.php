<?php

namespace LxstOne\VSS\src\services\upstream\v1;

use LxstOne\VSS\src\services\AbstractVideoStreamingService;

/**
 * @method void setApiKey(string $apiKey) Set API key for object
 * @method array getAccountInfo() Provides some general information about the account.
 * @method array getAccountStats(int $lastDays = 7) Statistics for the last x days.
 * @method array getUploadServer() Get a suitable upload server.
 * @method array uploadToServer(string $uploadServerUrl, string $filePath, string $fileName = null, string $fileDescription = null, string $fileSnapshotPath = null, int $folderId = null, int $categoryId = null, string $tagsString = null, bool $filePublic = null, bool $fileAdult = null, bool $htmlRedirect = null) Upload file to delivery node
 * @method array uploadUrl(string $url, int $folderId = null, int $categoryId = null, bool $filePublic = null, bool $fileAdult = null, string $tagsString = null) Add url to remote upload queue
 * @method array cloneFile(string $fileCode, string $fileName = null) Clone existing file code
 * @method array getFilesInfo(string[]|string $fileCodes) Information about file(s)
 * @method array editFiles(string[]|string $fileCodes, string $fileTitle = null, string $fileDescription = null, int $categoryId = null, int $folderId = null, bool $filePublic = null, bool $fileAdult = null, string $tagsString = null) Edit file(s)
 * @method array listFiles(int $pageNumber = null, int $perPage = null, int $folderId = null, string $createdAfter = null, string $fileName = null, bool $filePublic = null, bool $fileAdult = null) List uploaded files
 * @method array listFolder(int $folderId = null, bool $showFiles = null) List folders/files in folder
 * @method array createFolder(string $folderName, string $folderDescription = '', int $parentFolderId = null) Create new folder
 * @method array editFolder(int $folderId, string $folderName = null, int $parentFolderId = null, string $folderDescription = null) Update folder details
 * @method array listDeletedFiles(int $lastHours = null) Get last deleted files list
 * @method array listDeletedDMCAFiles(int $lastHours = null) Get files scheduled for DMCA delete
 * @method array getEncodingQueue(string $fileCode = null) Get current encoding queue
 */
final class Upstream extends AbstractVideoStreamingService
{
    const API_ENDPOINT = 'https://upstream.to/api';

    protected string $streamingService = 'upstream';
    protected string $apiVersion = 'v1';

    /**
     * @param string $apiKey
     */
    public function __construct(
        protected string $apiKey,
    ) {}
}
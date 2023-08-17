<?php

namespace LxstOne\VSS\src\services\voe\v1;

use LxstOne\VSS\src\services\AbstractVideoStreamingService;

/**
 * @method void setApiKey(string $apiKey)
 * @method array accountInfo() Provides some general information about the account. Cache: 5min
 * @method array accountStats() Statistics for the last 32 days.
 * @method array uploadServer() Get a suitable upload server.
 * @method array uploadToServer(string $deliveryNodeUrl, string $filePath) Upload file to delivery node
 * @method array uploadUrl(string $url) Add url to remote upload queue
 * @method array cloneFile(string $fileCode, int $folderId = 0) Clone existing file code, PROVIDED THE FILE OWNER HAS ALLOWED CLONING!
 * @method array filesInfo(string[]|string $fileCodes) Information about file(s) / mass check. Max 500
 * @method array filesList(int $pageNumber = 1, int $perPage = 20, int $folderId = 0, string $createdAfter = '', string $fileName = '')
 * @method array renameFile(string $fileCode, string $newTitle) Rename file title
 * @method array moveFiles(string[]|string $fileCodes, int $folderId) Move file(s) to folder
 * @method array deleteFiles(string[]|string $deleteCodes) Delete file(s)
 * @method array folderFiles(int $folderCode) List folder files
 * @method array createFolder(string $folderName, int $parentFolderId = 0) Create new folder
 * @method array renameFolder(int $folderId, string $folderName) Rename folder
 * @method array deletedFilesList(int $numberOfLastFiles) List deleted files
 * @method array deletedDMCAFilesList(int $numberOfLastFiles, bool $pending = false) List deleted dmca files
 */
final class Voe extends AbstractVideoStreamingService
{
    const API_ENDPOINT = 'https://voe.sx/api';

    protected string $streamingService = 'voe';
    protected string $apiVersion = 'v1';

    /**
     * @param string $apiKey
     */
    public function __construct(
        protected string $apiKey,
    ) {}
}
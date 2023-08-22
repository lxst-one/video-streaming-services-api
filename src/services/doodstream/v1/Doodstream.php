<?php

namespace LxstOne\VSS\src\services\doodstream\v1;

use LxstOne\VSS\src\services\AbstractVideoStreamingService;

/**
 * @method void setApiKey(string $apiKey) Set API key for object
 * @method array getAccountInfo() Get basic info of your account
 * @method array getAccountReports(int $lastDays = 7, string $fromDate = null, string $toDate = null) Get reports of your account (default last 7 days)
 * @method array listDMCAReports(int $perPage = null, int $page = null) Get DMCA reported files list (500 results per page)
 * @method array getUploadServer() Get a suitable upload server.
 * @method array uploadToServer(string $uploadServerUrl, string $filePath) Upload file to server
 * @method array cloneFile(string $fileCode, int $folderId = null) Copy / Clone yours or other's file
 * @method array uploadUrl(string $url, int $folderId = null, string $title = null) Upload files using direct links
 * @method array listUrlUploadQueue() Remote Upload List & Status
 * @method array getUrlUploadStatus(string $fileCode) Remote Upload Status
 * @method array getUrlUploadSlots() Get total & used remote upload slots
 * @method array editUrlUploads(bool $restartErrors = null, bool $clearErrors = null, bool $clearAll = null, bool $deleteUrlCode = null) Perform various actions on remote uploads
 * @method array createFolder(string $name, int $parentFolderId = null) Create a folder
 * @method array renameFolder(int $folderId, string $newName) Rename folder
 * @method array listFiles(int $page = null, int $perPage = null, int $folderId = null) List all files
 * @method array getFileStatus(string $fileCode) Check status of your file
 * @method array getFileInfo(string $fileCode) Get file info
 * @method array getFileImage(string $fileCode) Get file splash, single or thumbnail image
 * @method array renameFile(string $fileCode, string $newName) Rename your file
 * @method array searchFile(string $searchTerm) Search your files
 */
final class Doodstream extends AbstractVideoStreamingService
{
    const API_ENDPOINT = 'https://doodapi.com/api';
    const API_ENDPOINT_EXTRAS = 'https://dood.so/e';

    protected string $streamingService = 'doodstream';
    protected string $apiVersion = 'v1';

    /**
     * @param string $apiKey
     */
    public function __construct(
        protected string $apiKey,
    ) {}
}
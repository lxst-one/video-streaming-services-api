<?php

namespace LxstOne\VSS\src\services\vidoza\v1;

use LxstOne\VSS\src\services\AbstractVideoStreamingService;
use LxstOne\VSS\src\services\vidoza\v1\enums\SortingColumn;
use LxstOne\VSS\src\services\vidoza\v1\enums\SortingDirection;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoCategory;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoLang;
use LxstOne\VSS\src\services\vidoza\v1\enums\VideoLangExtension;

/**
 * @method void setApiKey(string $apiKey) Set API key for object
 * @method array getUploadServer() Get a suitable upload server.
 * @method array uploadToServer(string $uploadServerUrl, string $sessionId, string $filePath, string $fileTitle = null, int $folderId = null, VideoCategory $category = null) Upload file to delivery node
 * @method array uploadUrl(string $url, int $folderId, VideoCategory $category) Add url to remote upload queue.
 * @method array listUrlUploadQueue() List url upload tasks in queue
 * @method array removeUrlUploadTask(int $taskId) Destroy exists task from queue
 * @method array getFilesInfo(string|string[] $filesCodes) Get info about files
 * @method array listFolders(int $folderId = null) List folder(s)
 * @method array renameFolder(int $folderId, string $folderName) Rename folder
 * @method array createFolder(string $folderName, int $folderParentId = null) Create new folder
 * @method array listFiles(string $fileName = null, string $fileNameSEO = null, string $title = null, int $folderId = null, VideoCategory $category = null, int $downloadsFrom = null, int $viewsPaidFrom = null, int $downloadsTo = null, int $viewsPaidTo = null, SortingColumn $sortColumn = null, SortingDirection $sortDirection = null) List files by filters
 * @method array editFile(string $fileCode, string $fileName, string $fileNameSEO, string $title, string $folderId) Edit file
 * @method array listSrtForFile(string $fileCode) Shows the list srt of your file
 * @method array uploadSrtForFile(string $fileCode, VideoLang $lang, string $srtPath) Upload srt for file
 * @method array uploadSrtUrlForFile(string $fileCode, VideoLang $lang, string $srtUrl) Upload srt (from url) for file
 * @method array removeSrtForFile(string $fileCode, VideoLang $lang, VideoLangExtension $extension) Destroy selected srt lang from you file
 * @method array listFileAbuses() List your abuses files
 */
final class Vidoza extends AbstractVideoStreamingService
{
    const API_ENDPOINT = 'https://api.vidoza.net/v1';

    protected string $streamingService = 'vidoza';
    protected string $apiVersion = 'v1';

    /**
     * @param string $apiKey
     */
    public function __construct(
        protected string $apiKey,
    ) {}
}
# About
Unofficial API client package for popular video streaming services. Currently supported:
* Voe.sx
* Upstream.to

# Installation

**Required PHP version >= 8.x**

Currently, I have no plans to support lower versions, you can fork this repo and rewrite it.
```shell 
composer install lxst-one/video-streaming-services-api 
```

# Quick start
All implemented methods for each service are listed below.
### Create service instance
```php
use \LxstOne\VSS\src\VideoStreamingService;

$voe        = VideoStreamingService::voe('api-key', 'v1');
$upstream   = VideoStreamingService::upstream('api-key', 'v1');
```
First parameter is your API key (can be different for each instance), second is optional which specify API version to use
(by default the newest version is used)
```php
$result = $voe->getAccountInfo();
```
Return result is always an array containing values:
* status (response code)
* headers (headers packed into array ex. \['user-agent' => 'some-agent'\])
* data (raw data string from server)

# Services

### API docs
* Voe.sx            - https://voe.sx/api-1-reference-index
* Upstream.to       - https://upstream.to/api.html

### Voe.sx implemented methods
```php
//==============================
//|         API V1
//==============================

public interface voeV1 {
    function setApiKey(string $apiKey): void;                                           //Set API key for object
    function getAccountInfo(): array;                                                   //Provides some general information about the account. Cache: 5min
    function getAccountStats(): array;                                                  //Statistics for the last 32 days.
    function getUploadServer(): array;                                                  //Get a suitable upload server.
    function uploadToServer(string $deliveryNodeUrl, string $filePath): array;          //Upload file to delivery node
    function uploadUrl(string $url): array;                                             //Add url to remote upload queue
    function cloneFile(string $fileCode, int $folderId = 0): array;                     //Clone existing file code, PROVIDED THE FILE OWNER HAS ALLOWED CLONING!
    function getFilesInfo(string[]|string $fileCodes): array;                           //Information about file(s) / mass check. Max 500
    function listFiles(int $pageNumber = 1, int $perPage = 20, int $folderId = 0, string $createdAfter = null,
        string $fileName = null): array;                                                //List files in folder
    function renameFile(string $fileCode, string $newTitle): array;                     //Rename file title
    function moveFiles(string[]|string $fileCodes, int $folderId): array;               //Move file(s) to folder
    function deleteFiles(string[]|string $deleteCodes): array;                          //Delete file(s)
    function getFolderFiles(int $folderCode): array;                                    //List folder files
    function createFolder(string $folderName, int $parentFolderId = 0): array;          //Create new folder
    function renameFolder(int $folderId, string $folderName): array;                    //Rename folder
    function listDeletedFiles(int $numberOfLastFiles = null): array;                    //List deleted files
    function listDeletedDMCAFiles(int $numberOfLastFiles = null, 
        bool $pending = false): array;                                                  //List deleted dmca files
}
```

### Upstream.to implemented methods
```php
//==============================
//|         API V1
//==============================

public interface upstreamV1 {
    function setApiKey(string $apiKey): void;                                           //Set API key for object
    function getAccountInfo(): array;                                                   //Provides some general information about the account.
    function getAccountStats(int $lastDays = 7): array;                                 //Statistics for the last x days.
    function getUploadServer(): array;                                                  //Get a suitable upload server.
    function uploadToServer(string $uploadServerUrl, string $filePath,
        string $fileName = null, string $fileDescription = null,
        string $fileSnapshotPath = null, int $folderId = null, int $categoryId = null,
        string $tagsString = null, bool $filePublic = null, bool $fileAdult = null,
        bool $htmlRedirect = null): array;                                              //Upload file to delivery node
    function uploadUrl(string $url, int $folderId = null, int $categoryId = null,
        bool $filePublic = null, bool $fileAdult = null,
        string $tagsString = null): array;                                              //Add url to remote upload queue
    function cloneFile(string $fileCode, string $fileName = null): array;               //Clone existing file code
    function getFilesInfo(string[]|string $fileCodes): array;                           //Information about file(s)
    function editFiles(string[]|string $fileCodes, string $fileTitle = null,
        string $fileDescription = null, int $categoryId = null, int $folderId = null,
        bool $filePublic = null, bool $fileAdult = null,
        string $tagsString = null): array;                                              //Edit file(s)
    function listFiles(int $pageNumber = null, int $perPage = null,
        int $folderId = null, string $createdAfter = null, string $fileName = null,
        bool $filePublic = null, bool $fileAdult = null): array;                        //List uploaded files
    function listFolder(int $folderId = null, bool $showFiles = null): array;           //List folders/files in folder
    function createFolder(string $folderName, string $folderDescription = '',
        int $parentFolderId = null): array;                                             //Create new folder
    function editFolder(int $folderId, string $folderName = null,
        int $parentFolderId = null, string $folderDescription = null): array;           //Update folder details
    function listDeletedFiles(int $lastHours = null): array;                            //Get last deleted files list
    function listDeletedDMCAFiles(int $lastHours = null): array;                        //Get files scheduled for DMCA delete
    function getEncodingQueue(string $fileCode = null): array;                          //Get current encoding queue
}
```

# Tests
### Config
Fill all env variables in phpunit.xml with correct values. Some files/folders on tested services might require 
manual delete after running tests.

### Running all tests
In main project folder:
```shell
php ./vendor/bin/phpunit --configuration phpunit.xml tests/unit
```
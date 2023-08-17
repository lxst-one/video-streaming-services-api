## About
VideoStreamingServices is API client package for popular video streaming services. Currently supported:
* Voe.sx

## Installation
```shell 
composer install lxst-one/video-streaming-services-api 
```

## Quick start
All implemented methods for each service are listed below.
### Create service instance
```php
$voe = \LxstOne\VSS\src\VideoStreamingService::voe('api-key', 'v1');
```
First parameter is your API key (can be different for each instance), second is optional which specify API version to use
(default the newest version is used)
```php
$result = $voe->accountInfo();
```
Return result is always an array containing values:
* status (response code)
* headers (headers packed into array ex. \['user-agent' => 'some-agent'\])
* data (raw data string from server)

## Services

### API docs
* Voe.sx - https://voe.sx/api-1-reference-index

### Voe.sx implemented methods
```php
function setApiKey(string $apiKey): void                                    //Set API key for object
function accountInfo(): array                                               //Provides some general information about the account. Cache: 5min
function accountStats(): array                                              //Statistics for the last 32 days.
function uploadServer(): array                                              //Get a suitable upload server.
function uploadToServer(string $deliveryNodeUrl, string $filePath): array   //Upload file to delivery node
function uploadUrl(string $url): array                                      // Add url to remote upload queue
function cloneFile(string $fileCode, int $folderId = 0): array              // Clone existing file code, PROVIDED THE FILE OWNER HAS ALLOWED CLONING!
function filesInfo(string[]|string $fileCodes): array                       // Information about file(s) / mass check. Max 500
function filesList(int $pageNumber = 1, int $perPage = 20, int $folderId = 0,
    string $createdAfter = '', string $fileName = ''): array                // Information about file(s)
function renameFile(string $fileCode, string $newTitle): array              // Rename file title
function moveFiles(string[]|string $fileCodes, int $folderId): array        // Move file(s) to folder
function deleteFiles(string[]|string $deleteCodes): array                   // Delete file(s)
function folderFiles(int $folderCode): array                                // List folder files
function createFolder(string $folderName, int $parentFolderId = 0): array   // Create new folder
function renameFolder(int $folderId, string $folderName): array             // Rename folder
function deletedFilesList(int $numberOfLastFiles): array                    // List deleted files
function deletedDMCAFilesList(int $numberOfLastFiles, 
    bool $pending = false): array                                           // List deleted dmca files
```

## Tests
### Config
Fill all env variables in phpunit.xml with correct values. Some files/folders on tested services might require 
manual delete after running tests.

### Running all tests
In main project folder:
```shell
php ./vendor/bin/phpunit --configuration phpunit.xml tests/unit
```

## License

<?php

namespace LxstOne\VSS\src\services;

use LxstOne\VSS\src\shared\contracts\VideoStreamingServiceMethod;

abstract class AbstractVideoStreamingService
{
    protected string $apiVersion = '';
    protected string $apiKey = '';
    protected string $streamingService = '';

    /**
     * @param string $name
     * @param array $arguments
     * @return array
     */
    public function __call(string $name, array $arguments): array
    {
        /** @var VideoStreamingServiceMethod $class */
        $class = 'LxstOne\\VSS\\src\\services\\'. $this->streamingService .'\\'. $this->apiVersion .'\\methods\\' . ucfirst($name);
        return (new $class())->handle(
            array_merge($arguments, ['key' => $this->apiKey])
        );
    }

    /**
     * @param string $apiKey
     * @return $this
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }
}
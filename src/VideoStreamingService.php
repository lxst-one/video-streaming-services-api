<?php

namespace LxstOne\VSS\src;

/**
 * @method static voe(string $apiKey, string $apiVersion = 'v1')
 * @method static upstream(string $apiKey, string $apiVersion = 'v1')
 * @method static vidoza(string $apiKey, string $apiVersion = 'v1')
 * @method static doodstream(string $apiKey, string $apiVersion = 'v1')
 */
abstract class VideoStreamingService
{
    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments): mixed
    {
        $apiVersion = ($arguments[1] ?? self::getNewestApiVersionForService($name));

        $class = 'LxstOne\\VSS\\src\\services\\'. $name .'\\'. $apiVersion .'\\' . ucfirst($name);
        return new $class(...$arguments);
    }

    /**
     * @param string $name
     * @return string
     */
    public static function getNewestApiVersionForService(string $name): string
    {
        $servicePath = __DIR__ . '/services/' . $name;
        return basename(
            array_reverse(glob($servicePath . '/v*', GLOB_ONLYDIR))[0]
        );
    }
}
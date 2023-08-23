<?php

namespace LxstOne\VSS\src\shared\contracts;

interface VideoStreamingServiceMethod
{
    /**
     * @param array $data
     * @return array
     */
    public function handle(array $data = []): array;
}
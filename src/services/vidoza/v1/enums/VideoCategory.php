<?php

namespace LxstOne\VSS\src\services\vidoza\v1\enums;

enum VideoCategory: int
{
    case ADULT = 2;
    case EVERYONE = 3;

    /**
     * @return string
     */
    public function getCategoryString(): string
    {
        return match ($this->value) {
            2 => 'Adult',
            3 => 'Not adult'
        };
    }
}
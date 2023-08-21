<?php

namespace LxstOne\VSS\src\services\vidoza\v1\enums;

enum SortingColumn: string
{
    case ID = 'id';
    case NAME = 'name';
    case FOLDER_ID = 'folder_id';
    case DOWNLOADS = 'downloads';
    case VIEWS_PAID = 'views_paid';
    case SIZE = 'size';
    case CREATED = 'created';
    case STATUS = 'status';
}
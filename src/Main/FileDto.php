<?php
namespace AlexeyYashin\Bitrix\Dto\Main;

use AlexeyYashin\Bitrix\Dto\AbstractDto;

class FileDto extends AbstractDto
{
    protected static $array_upper = true;
    protected static $filter_nulls = false;

    public $id;
    public $timestamp_x;
    public $module_id;
    public $height;
    public $width;
    public $file_size;
    public $content_type;
    public $subdir;
    public $file_name;
    public $original_name;
    public $description;
    public $handler_id;
    public $external_id;
    public $src;

    /**
     * @param $primary
     *
     * @return \AlexeyYashin\Bitrix\Dto\Main\FileDto|null
     */
    public static function find($primary): ?AbstractDto
    {
        $array = \CFile::GetFileArray($primary);

        return $array ? new static($array) : null;
    }
}

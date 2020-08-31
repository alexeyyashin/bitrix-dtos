<?php
namespace AlexeyYashin\Bitrix\Dto\Iblock;

use AlexeyYashin\Bitrix\Dto\AbstractDto;

class PropertyDto extends AbstractDto
{
    protected static $array_upper = true;

    protected static $tilda = true;

    public $id;
    public $code;
    public $xml_id;
    public $iblock_id;
    public $name;
    public $active = 'Y';
    public $is_required = 'N';
    public $sort = 500;
    public $property_type = 'S';
    public $multiple = 'N';
    public $timestamp_x;
    public $default_value;
    public $row_count = 1;
    public $col_count = 30;
    public $list_type = 'L';
    public $multiple_cnt;
    public $file_type;
    public $searchable = 'N';
    public $filterable = 'N';
    public $link_iblock_id;
    public $with_description;
    public $version = 1;
    public $user_type;
    public $user_type_settings;
    public $hint;

    public $value;
    public $value_enum;
    public $value_enum_id;
    public $value_xml_id;
    public $value_sort;
}

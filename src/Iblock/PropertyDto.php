<?php
namespace AlexeyYashin\Bitrix\Dto\Iblock;

use AlexeyYashin\Bitrix\Dto\AbstractDto;
use Bitrix\Iblock\IblockTable;

/**
 * Class PropertyDto
 *
 * @property-read \AlexeyYashin\Bitrix\Dto\Iblock\IblockDto|null $iblock
 * @property-read \AlexeyYashin\Bitrix\Dto\Iblock\IblockDto|null $link_iblock
 *
 * @package AlexeyYashin\Bitrix\Dto\Iblock
 */
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

    public function __get($name)
    {
        switch ($name) {
            case 'iblock': {

                $iblock = IblockTable::getById($this->iblock_id)->fetch();
                if ($iblock) {
                    return new IblockDto($iblock);
                }
                break;
            }
            case 'link_iblock': {

                $iblock = IblockTable::getById($this->iblock_id)->fetch();
                if ($iblock) {
                    return new IblockDto($iblock);
                }
                break;
            }
        }

        return null;
    }
}

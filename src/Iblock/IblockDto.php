<?php

namespace AlexeyYashin\Bitrix\Dto\Iblock;

use AlexeyYashin\Bitrix\Dto\AbstractDto;

class IblockDto extends AbstractDto
{
    protected static $array_upper = true;

    protected static $tilda = true;

    public $id;
    public $timestamp_x;
    public $iblock_type_id;
    public $code;
    public $name;
    public $actve = 'Y';
    public $sort = 500;
    public $list_page_url;
    public $detail_page_url;
    public $section_page_url;
    public $canonical_page_url;
    public $picture;
    public $description;
    public $description_type;
    public $xml_id;
    public $tmp_id;
    public $index_element;
    public $index_section;
    public $workflow;
    public $section_chooser;
    public $list_mode;
    public $rights_mode;
    public $section_property;
    public $version;
    public $last_conv_element;
    public $socnet_group_id;
    public $edit_file_before;
    public $edit_file_after;
}

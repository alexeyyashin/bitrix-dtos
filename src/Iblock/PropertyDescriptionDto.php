<?php
namespace AlexeyYashin\Bitrix\Dto\Iblock;

use AlexeyYashin\Bitrix\Dto\AbstractDto;

class PropertyDescriptionDto extends AbstractDto
{
//    protected static $array_upper = false;
    protected static $filter_nulls = false;
    protected static $keep_case = true;

    public $PROPERTY_TYPE = 'S';
    public $USER_TYPE = '';
    public $DESCRIPTION = '';

    public $GetPublicViewHTML;
    public $GetPublicEditHTML;
    public $GetAdminListViewHTML;
    public $GetAdminFilterHTML;
    public $GetPublicFilterHTML;
    public $GetPropertyFieldHtml;

    public $CheckFields;

    public $ConvertToDB;
    public $ConvertFromDB;
    public $GetLength;
    public $GetSearchContent;

    public $AddFilterFields;

    public $PrepareSettings;
    public $GetSettingsHTML;
}

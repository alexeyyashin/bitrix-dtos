<?php
namespace AlexeyYashin\Bitrix\Dto;

use ArrayIterator;
use ArrayObject;

/**
 * Class AbstractDto
 *
 * @property-read array $toArray
 *
 * @package Malltech\Dto
 */
abstract class AbstractDto extends ArrayObject
{
    /**
     * @var bool
     */
    protected static $array_upper = false;
    /**
     * @var bool
     */
    protected static $filter_nulls = false;

    protected static $keep_case = false;

    protected static $tilda = false;

    /**
     * @var \Bitrix\Main\Entity\DataManager
     */
    protected static $orm = null;

    /**
     * AbstractDto constructor.
     *
     * @param array $array
     */
    public function __construct($array = [])
    {
        if ( ! static::$keep_case) {

            $array = array_change_key_case($array, CASE_LOWER);
        }

        foreach ($array as $key => $value) {
            if (static::$tilda) {
                $key = preg_replace('/^~/', '', $key);
            }
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            } else {
                unset($array[$key]);
            }
        }

        parent::__construct($this->getArrayCopy(), ArrayObject::STD_PROP_LIST/* | \ArrayObject::ARRAY_AS_PROPS*/);
    }

    /**
     * @return array
     */
    public function getArrayCopy(): array
    {
        $array = $this->mkArray();

        $this->exchangeArray($array);

        return $array;
    }

    /**
     * @return array
     */
    private function mkArray(): array
    {
        $array = get_object_vars($this);

        if (static::$filter_nulls) {
            $array = array_filter($array, function ($v)
            {
                return $v !== null;
            });
        }

        if (static::$array_upper) {
            $array = array_change_key_case($array, CASE_UPPER);
        }

        return $array;
    }

    /**
     * @deprecated use read-only magic toArray property
     * @see $this->asArray
     * @return array
     */
    public function toArray(): array
    {
        return $this->getArrayCopy();
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator((array)$this->getArrayCopy());
    }

    /**
     * @param mixed $index
     *
     * @return mixed
     */
    public function offsetGet($index)
    {
        $index = mb_strtolower($index);
        $this->getArrayCopy();

        return $this->{$index};
    }

    /**
     * @param mixed $index
     * @param mixed $newval
     */
    public function offsetSet($index, $newval)
    {
        $this->{mb_strtolower($index)} = $newval;
        parent::offsetSet($index, $newval);
        $this->getArrayCopy();
    }

    protected static function handleFinder(array $res)
    {
        return $res;
    }

    public static function find($primary): ?AbstractDto
    {
        if (static::$orm !== null) {
            $res = static::$orm::getByPrimary($primary)->fetch();

            if ($res) {
                return new static(static::handleFinder($res));
            }
        }

        return null;
    }

    public function __get($name)
    {
        if ($name === 'toArray') {
            return $this->toArray();
        }

        return null;
    }
}

<?php

namespace KassaCom\SDK\Utils;

class LogCleaner
{
    /** @var array */
    private $fieldMapper;

    protected function __construct()
    {
        $this->fieldMapper = [];
    }

    public static function getCleaner()
    {
        return new static();
    }

    /**
     * @return \Closure
     */
    public static function getCallbackForPan()
    {
        return function ($value) {
            return CardUtils::maskPan($value);
        };
    }

    /**
     * @param array $fields
     * @param string|callable $mapper
     *
     * @return $this
     */
    public function addFieldMapper(array $fields, $mapper)
    {
        $fields = array_map('mb_strtolower', $fields);
        $fields = array_combine($fields, array_fill(0, count($fields), $mapper));
        $this->fieldMapper = array_merge($this->fieldMapper, $fields);

        return $this;
    }

    public function clearLoggableData($loggableArray)
    {
        if (!is_array($loggableArray)) {
            return $loggableArray;
        }

        foreach ($loggableArray as $key => $value) {
            $normalizedKey = mb_strtolower($key);
            if (is_array($value)) {
                $loggableArray[$key] = $this->clearLoggableData($value);
                continue;
            }

            if (isset($this->fieldMapper[$normalizedKey])) {
                if (!is_string($this->fieldMapper[$normalizedKey]) && is_callable($this->fieldMapper[$normalizedKey])) {
                    $loggableArray[$key] = $this->fieldMapper[$normalizedKey]($value);
                } else {
                    $loggableArray[$key] = sprintf('**%s**', $this->fieldMapper[$normalizedKey]);
                }
            }
        }

        return $loggableArray;
    }
}

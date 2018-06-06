<?php


namespace KassaCom\SDK\Model\Interfaces;


use KassaCom\SDK\Exception\UnsupportableTypeException;

interface DataContainerInterface
{
    /**
     * @return array field_name => field_type
     * @throws UnsupportableTypeException
     */
    public function getRequiredFields();

    /**
     * @return array field_name => field_type
     * @throws UnsupportableTypeException
     */
    public function getOptionalFields();

    /**
     * @return array [[field_name, field_name, ...], [field_name, field_name, ...], ...]
     */
    public function getThoughOneField();
}

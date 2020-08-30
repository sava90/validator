<?php

namespace Field;

abstract class AbstractField
{
    /** @var string */
    private $type = 'text';

    /** @var array */
    private $validator = [];

    /** @var string */
    private $name;

    /** @var string */
    private $value;

    /**
     * @return string
    */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
    */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
    */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
    */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
    */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return array
    */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param $validator
     */
    public function addValidator($validator)
    {
        $this->validator[] = $validator;
    }
} 

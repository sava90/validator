<?php

namespace Validator;

abstract class AbstractValidator {

    /** @var string */
    private $error = '';

    /**
     * @param $value
     * @return bool
    */
    abstract public function isValid($value);

    /**
     * @param $errorString
    */
    public function addError($errorString)
    {
        $this->error = $errorString;
    }

    /**
     * @return string
    */
    public function getError()
    {
        return $this->error;
    }
}
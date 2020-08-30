<?php

namespace Validator;

class IP extends AbstractValidator
{
    /**
     * @param $value
     * @return bool
    */
    public function isValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_IP)) {
            $this->addError('Incorrect IP');

            return false;
        }

        return true;
    }
} 
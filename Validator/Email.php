<?php

namespace Validator;

class Email extends AbstractValidator
{
    /**
     * @param $value
     * @return bool
    */
    public function isValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError('Incorrect email');

            return false;
        }

        return true;
    }
} 
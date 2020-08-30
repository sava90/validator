<?php

namespace Validator;

class Required extends AbstractValidator
{
    /**
     * @param $value
     * @return bool
    */
    public function isValid($value)
    {
        if (!trim($value)) {
            $this->addError('This field is required');

            return false;
        }

        return true;
    }
} 
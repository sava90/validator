<?php

namespace Validator;

class Date extends AbstractValidator
{
    /** @var string */
    private $format = 'Y-m-d';

    /**
     * @param $value
     * @return bool
    */
    public function isValid($value)
    {
        $date = \DateTime::createFromFormat($this->format, $value);

        if (!($date && $date->format($this->format) === $value)) {
            $this->addError('Incorrect date');

            return false;
        }

        return true;
    }
} 
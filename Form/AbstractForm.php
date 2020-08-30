<?php

namespace Form;

use Field\Field;

abstract class AbstractForm
{
    /** @var array */
    private $fields = [];

    /** @var array */
    private $errors = [];

    /**
     * @param $name
     * @param $value
    */
    public function __set($name, $value)
    {
        if (isset($this->fields[$name])) {
            $this->fields[$name]->setValue($value);
        }
    }

    /**
     * @param $name
     * @return string
    */
    public function __get($name)
    {
        if (isset($this->fields[$name])) {
            return $this->fields[$name];
        }
    }

    /**
     * @param $type
     * @param $name
     * @param $validation
    */
    public function addField($type = 'text', $name = 'name', $validator = [])
    {
        $field = new Field();
        $field->setType($type);
        $field->setName($name);

        if(!empty($validator)) {
            foreach ($validator as $value) {
                $field->addValidator($value);
            }
        }

        $this->fields[$name] = $field;
    }

    /**
     * @param $fieldName
     * @param $error
    */
    public function addError($fieldName, $error)
    {
        if (!is_array($this->errors)) {
            $this->errors = [];
        }

        if (!isset($this->errors[$fieldName])) {
            $this->errors[$fieldName] = [];
        }

        $this->errors[$fieldName] = $error;
    }

    public function validate()
    {
        foreach ($this->fields as $field) {
            $validator = $field->getValidator();

            foreach ($validator as $value) {
                $className = '\\Validator\\'.ucfirst($value);
                $validatorObj = new $className;
                if (!$validatorObj->isValid($field->getValue())) {
                    $this->addError($field->getName(), $validatorObj->getError());
                }
            }
        }
    }

    public function submit()
    {
        $this->validate();
        if(!empty($this->errors)){
            echo '<h1>Error</h1>';
            echo '<ul>';
            foreach ($this->errors as $filedName=>$error) {
                echo '<li>'.$filedName.':'.$error.'</li>';
            }
            echo '</ul>';
        }else{
            echo '<h1>Submit form successfully</h1>';
        }
    }
} 
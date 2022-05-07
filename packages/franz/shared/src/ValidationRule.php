<?php

namespace Franz\Shared;

class ValidationRule
{
    protected mixed $value;
    protected array $rules = [];


    /**
     * @throws \Exception
     */
    public function __construct($data)
    {
        foreach ($this->rules as $rule){
            if(!$rule->isValid($data)){
                throw new \Exception($rule->getMessage());
            }
        }
        $this->value = $data;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }



}

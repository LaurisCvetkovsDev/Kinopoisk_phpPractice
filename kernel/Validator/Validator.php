<?php

namespace App\Kernel\Validator;
class Validator
{

    private array $errors = [];
    private $data;

    public function validate($data, $rules)
    {
        $this->data = $data;
        $this->errors = [];
        foreach ($rules as $key => $rule) {
            $rules = $rule;

            foreach ($rules as $rule) {
                $rule = explode(':', $rule);

                $ruleName = $rule[0];
                $ruleValue = $rule[1] ?? null;

                $error = $this->validateRule($key, $ruleName, $ruleValue);

                if ($error) {
                    $this->errors[$key][] = $error;
                }
            }
        }
        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }


    private function validateRule($key, $ruleName, $ruleValue = null): false|string
    {
        $value = $this->data[$key];

        switch ($ruleName) {
            case 'required':
                if (!$value) {
                    return 'Field is Required';
                }
                break;
            case 'min':
                if (strlen($value) < $ruleValue) {
                    return "Field must be at least {$ruleValue} characters long";
                }
                break;
            case 'max':
                if (strlen($value) > $ruleValue) {
                    return "Fild must be at most {$ruleValue} characters long";
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return 'Field must be a valid email adress';
                }
                break;
        }
        return false;
    }
}
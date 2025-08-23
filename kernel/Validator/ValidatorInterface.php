<?php

namespace App\Kernel\Validator;
interface ValidatorInterface
{
    public function validate($data, $rules);
    public function errors();
}
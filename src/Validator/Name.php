<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

#[\Attribute]
class Name extends Constraint
{
    public $message = 'В поле имя должна содержаться строка';
}
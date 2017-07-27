<?php

namespace Bavix\Gearman;

class Task
{

    public static function getName($name) : string
    {
        return __FILE__ . $name;
    }

}


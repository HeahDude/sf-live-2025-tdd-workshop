<?php

namespace App;

class NameInverter
{
    public function invert(?string $name): string
    {
        if (empty($name)) {
            return '';
        }

        return trim($name);
    }
}

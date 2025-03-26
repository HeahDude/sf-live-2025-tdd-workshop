<?php

namespace App;

class NameInverter
{
    public function invert(?string $name): string
    {
        if (empty($name)) {
            return '';
        }

        $parts = explode(' ', trim($name));

        if (count($parts) < 2) {
            return $parts[0];
        }

        return sprintf('%s, %s', $parts[1], $parts[0]);
    }
}

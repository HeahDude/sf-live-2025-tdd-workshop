<?php

namespace App;

class WordWrapper
{
    public function wrap(string $s, int $width): string
    {
        if (empty($s)) {
            return '';
        }

        if (strlen($s) <= $width) {
            return $s;
        }

        return str_replace(' ', "\n", $s);
    }
}

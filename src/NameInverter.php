<?php

namespace App;

class NameInverter
{
    public function invert(?string $name): string
    {
        if (empty($name)) {
            return '';
        }

        $parts = preg_split('#\s+#', trim($name));

        if ($this->isHonorific($parts[0])) {
            array_shift($parts);
        }

        if (count($parts) < 2) {
            return $parts[0];
        }

        return trim(sprintf('%s, %s %s', $parts[1], $parts[0], $this->getPostNominals($parts)));
    }

    private function isHonorific(string $part): bool
    {
        return preg_match('#mr|mrs|ms#', str_replace('.', '', strtolower($part)));
    }

    private function getPostNominals(array $parts): string
    {
        if (count($parts) > 2) {
            return implode(' ', array_slice($parts, 2));
        }

        return '';
    }
}

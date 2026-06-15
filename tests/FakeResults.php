<?php

namespace ExamenRecuVvs\Test;

use ExamenRecuVvs\Results;

class FakeResults implements Results
{
    private array $matches;
    public function __construct(array $matches)
    {
        $this->$matches = $matches;
    }

    public function getResultado(string $match): ?string
    {
        if (isset($this->matches[strtolower($match)])) {
            return $this->matches[strtolower($match)];
        } else {
            return null;
        }
    }

}
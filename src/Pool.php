<?php

namespace ExamenRecuVvs;

class Pool
{
    private Results $results;
    public function __construct(Results $results)
    {
        $this->$results = $results;
    }
    public function handle(string $instruction): string
    {
        return 'Hola';
    }
}

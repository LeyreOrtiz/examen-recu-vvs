<?php

namespace ExamenRecuVvs;

interface Results
{
    public function getResultado(string $partido): ?string;
}

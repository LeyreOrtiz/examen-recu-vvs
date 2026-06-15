<?php

namespace ExamenRecuVvs;

interface Results
{
    public function getResult(string $match): ?string;
}

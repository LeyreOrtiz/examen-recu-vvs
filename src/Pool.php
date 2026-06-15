<?php

namespace ExamenRecuVvs;

class Pool
{
    public function handle(string $instruction): string
    {
        $instructionSplitted = explode(' ', $instruction);
        $instructionAction = $instructionSplitted[0] ?? null;
        $match = $instructionSplitted[1] ?? null;
        $sign = $instructionSplitted[2] ?? null;
        return $match . ' ' . $sign;
    }
}

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
        if ($sign !== '1' or $sign !== '2' or $sign !== 'X') {
            return 'Signo no válido';
        }
        return $match . ' ' . $sign;
    }
}

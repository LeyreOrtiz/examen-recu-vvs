<?php

namespace ExamenRecuVvs;

class Pool
{
    private const SIGNS = ['1', '2', 'X'];
    public function handle(string $instruction): string
    {
        $instructionSplitted = explode(' ', $instruction);
        $instructionAction = $instructionSplitted[0] ?? null;
        $match = $instructionSplitted[1] ?? null;
        $sign = $instructionSplitted[2] ?? null;

        if (!in_array($sign, self::SIGNS)) {
            return "Signo no válido";
        }
        return $match . ' ' . $sign;
    }
}

<?php

namespace ExamenRecuVvs;

class Pool
{
    private const SIGNS = ['1', '2', 'X'];
    private $bets = [];
    public function handle(string $instruction): string
    {
        $instructionSplitted = explode(' ', $instruction);
        $instructionAction = $instructionSplitted[0] ?? null;
        $match = $instructionSplitted[1] ?? null;
        $sign = $instructionSplitted[2] ?? null;

        if (!in_array($sign, self::SIGNS)) {
            return "Signo no válido";
        }

        return $this->betMatch($match, $sign);
    }

    private function betMatch(string $match, string $sign): string
    {
        $this->bets[$match] = $sign;
        $finalPool = [];
        foreach ($this->bets as $bet => $signBet) {
            $finalPool[] = $bet . ': ' . $signBet;
        }

        return implode(', ', $finalPool);
    }
}

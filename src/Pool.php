<?php

namespace ExamenRecuVvs;

class Pool
{
    private const ACTION_BET = 'apostar';
    private const ACTION_DELETE = 'quitar';
    private const SIGNS = ['1', '2', 'X'];
    private array $bets = [];
    private Results $results;
    public function __construct(Results $results)
    {
        $this->results = $results;
    }
    public function handle(string $instruction): string
    {
        $instructionSplitted = explode(' ', $instruction);
        $instructionAction = $instructionSplitted[0] ?? null;
        $match = $instructionSplitted[1] ?? null;
        $sign = $instructionSplitted[2] ?? null;
        if (strcasecmp($instructionAction, self::ACTION_DELETE) === 0) {
            if (!isset($this->bets[$match])) {
                return 'La apuesta seleccionada no existe';
            }
            unset($this->bets[$match]);
            if (empty($this->dishes)) {
                return 'La quiniela está vacía';
            }
        } elseif (strcasecmp($instructionAction, self::ACTION_BET) === 0) {
            if (!in_array($sign, self::SIGNS)) {
                return "Signo no válido";
            }
            $this->betMatch($match, $sign);
        }
        return $this->returnPool();
    }

    private function betMatch(string $match, string $sign): void
    {
        $this->bets[$match] = $sign;
    }

    private function returnPool(): string
    {
        $finalPool = [];
        foreach ($this->bets as $bet => $signBet) {
            $finalPool[] = $bet . ': ' . $signBet;
        }

        return implode(', ', $finalPool);
    }
}

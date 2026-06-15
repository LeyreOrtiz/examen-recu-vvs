<?php

namespace ExamenRecuVvs;

class Pool
{
    private const ACTION_BET = 'apostar';
    private const ACTION_DELETE = 'quitar';
    private const SIGNS = ['1', '2', 'X'];
    private const MSG_BET_NOT_EXISTS = 'La apuesta seleccionada no existe';
    private const MSG_POOL_CLEARED = 'La quiniela está vacía';
    private const MSG_INVALID_SIGN = 'Signo no válido';
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
                return self::MSG_BET_NOT_EXISTS;
            }
            unset($this->bets[$match]);
            if (empty($this->bets)) {
                return self::MSG_POOL_CLEARED;
            }
        } elseif (strcasecmp($instructionAction, self::ACTION_BET) === 0) {
            if (!in_array($sign, self::SIGNS)) {
                return self::MSG_INVALID_SIGN;
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
